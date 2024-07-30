<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $rent_logs = RentLogs::latest()->with('user', 'car')->whereHas('user', function ($query) use ($keyword) {
            $query->where('username', 'LIKE', '%' . $keyword . '%');
        })
        ->orWhereHas('car', function ($query) use ($keyword) {
            $query->where('model', 'LIKE', '%' . $keyword . '%');
        })
        ->paginate(10);
        return view('rentlog', ['rent_logs' => $rent_logs]);
    }
}
