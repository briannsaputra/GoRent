<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $cars = Car::all();
        return view('car-rent', ['users' => $users, 'cars' => $cars]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'return_date' => 'required',
        ]);
        $request['rent_date'] = Carbon::now()->toDateString();
        
        
        $car = Car::findOrFail($request->car_id)->only('status');
        
        if ($car['status'] != 'in stock') {
            Session::flash('message', 'Mobil Sedang Di Pinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('mobil-rent');
        }
        else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
                ->count();

            if($count >= 3) {
                Session::flash('message', 'Gagal, Pengguna Sudah Meminjam 3 Mobil');
                Session::flash('alert-class', 'alert-danger');
                return redirect('book-rent');
            }
            else{
            try {
                DB::beginTransaction();
                RentLogs::create($request->all());
                $car = Car::findOrFail($request->car_id);
                $car->status = 'not available';
                $car->save();
                DB::commit();

                Session::flash('message', 'Mobil Berhasil Di Pinjam');
                Session::flash('alert-class', 'alert-success');
                return redirect('mobil-rent');
                
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }
    }

    public function returnCar()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $cars = Car::all();
        return view('return-car', ['users' => $users, 'cars' => $cars]);
    }

    public function saveReturnCar(Request $request)
    {
    
        $rent = RentLogs::where('user_id', $request->user_id)->where('car_id', $request->car_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();
       
        if($countData == 1) {
            
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $book = Car::findOrFail($request->car_id);
            $book->status = 'in stock';
            $book->save();

            Session::flash('message', 'Mobil Berhasil Dikembalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('returncar');
        } else {
            
            Session::flash('message', 'Gagal, Mobil Sudah Di Kembalikan');
            Session::flash('alert-class', 'alert-danger');
            return redirect('returncar');
        }
    }
}
