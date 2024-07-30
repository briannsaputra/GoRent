<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() 
    {
        return view('login');
    }
    public function register() 
    {
        return view('register');
    }

    // Proses Login
    public function authenticating(Request $request)
        {
            
            $credentials = $request->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
    
            // Cek apakah login benar
            if (Auth::attempt($credentials)) {
                // Cek apakah user status = active
                if(Auth::user()->status != 'active'){
                    // Mencegah User yang tidak aktif bisa login
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    // Arlet gagal login
                    Session::flash('status', 'failed');
                    Session::flash('message', 'akun anda belum active silahkan hubungi admin');
                    return redirect('/login');
                }
    
                
                $request->session()->regenerate();
                if(Auth::user()->role_id == 1){
                    return redirect('/dashboard');
                }
                if(Auth::user()->role_id == 2){
                    return redirect('/dashboarduser');
                }   
            }
                Session::flash('status', 'Username atau Password Salah');
                Session::flash('message', 'Username atau Password Salah');
                return redirect('/login');
        }
    
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login');
        }

        public function registerProcess(Request $request)
        {
            // Validate
        $validated = $request->validate([
            'username' => 'required|max:255|unique:users',
            'password' => 'required|max:255',
            'no_ktp' => 'required|max:16|unique:users',
        ]);
            // Enskripsi Password MD5
            $request['password'] = Hash::make($request->password);
            $user = User::create($request->all());

            Session::flash('status', 'Success');
            Session::flash('message', 'Berhasil Register, Silahkan Tunggu Admin Mengaktifkan Akun Anda');
            return redirect('register');
        }
}
