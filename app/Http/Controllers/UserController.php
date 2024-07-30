<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function homeuser()
    {
        $currentTime = Carbon::now();
        $hour = $currentTime->format('G');


        if ($hour >= 6 && $hour <= 11) {
            $greeting = "Selamat Pagi";
        } else if ($hour >= 12 && $hour <= 2) {
            $greeting = "Selamat Siang";
        } else {
            $greeting = "Selamat Malam";
        }

        Auth::user();
        $rentlogs = RentLogs::latest()->with(['user', 'car'])->where('user_id', Auth::user()->id)->get();
        return view('halamanuser', ['rent_logs' => $rentlogs, 'greeting' => $greeting]);
    }

    public function edit(Request $request)
    {

        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        $user = User::find(auth()->user()->id);

        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('foto', $newName);
            $request['foto'] = $newName;
        }

        $user->foto = $newName;
        $user->save();


        return redirect('profile')->withToastSuccess('User Berhasil Di Update!');
    }

    public function profile()
    {
        return view('profile');
    }
    

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $user = User::where('username', 'LIKE', '%'.$keyword.'%')->where('role_id', 2)->where('status', 'active')->paginate(5);
        return view('user', ['user' => $user]);
    }

    public function registeredUser()
    {
        
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('registered-user', ['registeredUsers' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::latest()->with(['user', 'car'])->where('user_id', $user->id)->get();
        return view('user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }

    public function update(Request $request, $slug)
    {
        // jika name Imgae di jalankan akan memproses yang sibawah
        if($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('foto', $newName);
            $request['foto'] = $newName;
        }

        //  Where = Mengabil data nama(slug)
        $user = User::where('slug', $slug)->first();
        $user->update($request->all());

        return redirect('users')->withToastSuccess('User Berhasil Di Update!');
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-detail/'.$slug)->withToastSuccess('User Berhasil Di Setujui');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('users')->withToastSuccess('User Berhasil Di Ban!');
    }

    public function bannedUser()
    {
        $bannedUser = User::onlyTrashed()->get();
        return view('user-benned', ['bannedUser' => $bannedUser]);
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        return redirect('users')->withToastSuccess('User Berhasil Di Kembalikan');
    }
}
