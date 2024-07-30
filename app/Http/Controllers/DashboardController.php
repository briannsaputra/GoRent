<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Brand;
use App\Models\RentLogs;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index()
    {


        $carCount = Car::count();
        $brandCount = Brand::count();
        $userCount = User::count();
        $rentlogs = RentLogs::where('actual_return_date', null)->count();
        $user = User::latest()->where('role_id', 2)->where('status', 'active')->paginate(5);
        $rent_logs = RentLogs::latest()->with(['user', 'car'])->simplePaginate(4);
        return view('dashboard', ['rentlogs' => $rentlogs, 'rent_logs' => $rent_logs, 'user' => $user, 'car_count' => $carCount, 'brand_count' => $brandCount, 'user_count' => $userCount]);
    }
}
