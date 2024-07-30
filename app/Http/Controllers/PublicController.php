<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::all();

        if ($request->brand || $request->model) {
            $cars = Car::where('model', 'like', '%'.$request->model.'%')
                    ->orWhereHas('brands', function($q) use($request) {
                        $q->where('brands.id', $request->brand);
                    })
                    ->get();
        }
        else {
            $cars = Car::latest()->paginate(12);
        }
        return view('Home', ['cars' => $cars, 'brands' => $brands]);
    }
}
