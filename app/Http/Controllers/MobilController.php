<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\MobilCreateRequest;
use App\Http\Requests\MobilUpdateRequest;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $car = Car::latest()->where('model', 'LIKE', '%'.$keyword.'%')
        ->orWhere('car_plate', 'LIKE', '%'.$keyword.'%')
        ->orWhere(function($query) use($keyword) {
            $query->where('model', 'LIKE', '%'.$keyword.'%');
        })
        ->paginate(5);
        $brand = Brand::all();
        return view('mobil', ['car' => $car, 'brand' =>$brand]);
    }

    
    public function store(MobilCreateRequest $request)
    {
        $newName = '';
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('foto', $newName);
        }
        $request['foto'] = $newName;

        $car = Car::create($request->all());
        $car->brands()->sync($request->brands);
        return redirect('car')->withToastSuccess('Brand Berhasil Di Tambahkan!');
    }

    public function edit($slug)
    {
        $car = Car::where('slug', $slug)->first();
        $brands = Brand::all();
        return view('car-edit', ['brands' => $brands, 'car' => $car]);
    }


    public function update(MobilUpdateRequest $request, $slug)
    {
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('foto', $newName);
            $request['foto'] = $newName;
        }

        //  Where = Mengabil data nama(slug)
        $car = Car::where('slug', $slug)->first();
        $car->update($request->all());

        if($request->brands) {
            $car->brands()->sync($request->brands);
        }

        return redirect('car')->withToastSuccess('Brand Berhasil Di Update!');
    }

    public function destroy($slug)
    {
        $car = Car::where('slug', $slug)->first();
        $car->delete();
        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
