<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\BrandCreateRequest;
use App\Http\Requests\BrandUpdateRequest;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $brand = Brand::latest()->where('name', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);
        return view('brand', ['brand' => $brand]);
    }

    public function store(BrandCreateRequest $request)
    {
        $brand = Brand::create($request->all());
        return redirect('brand')->withToastSuccess('Brand Berhasil Di Tambahkan!');
    }

    public function edit($slug)
    {
        // Mencari data sesuai slug
        $brand = Brand::where('slug', $slug)->first();
        return view('brand-edit', ['brand' => $brand]);
    }

    public function update(BrandUpdateRequest $request, $slug)
    {

        $brand = Brand::where('slug', $slug)->first();
        $brand->slug = null;
        $brand->update($request->all());
        return redirect('brand')->withToastSuccess('Brand Berhasil Di Update!');
    }

    public function delete($slug)
    {
        $brand = Brand::where('slug', $slug);
        $brand->delete();

        return back()->with('info', 'Data Berhasil Dihapus');
    }
}
