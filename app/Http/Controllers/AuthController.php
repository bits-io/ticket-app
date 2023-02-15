<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginAction(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check = User::where('email',$request->email)->first();
        if ($check->role_id == 1) {
            if(Auth::attempt($request->only('email','password'))){
                return redirect('admin/dashboard');
            }
        }

        if ($check->role_id == 2) {
            if(Auth::attempt($request->only('email','password'))){
                return redirect('home');
            }
        }

        return redirect('/login')->with('error','Email or Password are wrong');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    public function registrationAction(Request $request){
        $request->validate([
            'name' => 'required|email',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);


        User::create([
            'name' => $request->name,
            'role_id' => 3,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);
        return view('auth.login')->with('success','Register successfully!!!');
    }

    public function logout(){
        Auth::logout();
        return redirect ('/login');
    }

    public function dashboard() {
        return view('app.dashboard');
    }
    public function home() {
        $data['concert'] = Concert::all();
        return view('app.customer.home', $data);
    }
}
