<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController\Hash;

use Illuminate\Support\Facades\Auth;
use App\Models\AdminModel\Admin;
use Validator;
use DB;
use DateTime;
use Illuminate\Contracts\Session\Session;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function loginView()
    {
        return view('admin.register');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('login');
    }

    public function registerUser(Request $request)
    {
        // $request->validate([
        //     'email'         =>  'required|string|email',
        //     'password'      =>  'required|string|min:6'
        // ]);
        // $User = Admin::where('email', '=', $request->email)->first();

        // if ($User) {
        //     $credentials = $request->only('email', 'password');
        //     if (Auth::guard('admin')->attempt($credentials)) {
        //         // $request->session()->put('loginId', $User->id);
        //         return redirect(route('dashboard'));
        //     }
        // } else {
        //     return back()->withErrors([
        //         'email' => 'Email is required.',
        //         'password' => 'Password is required.',
        //     ]);
        // }



        $validator = Validator::make($request->all(), [
            'email'         =>  'required|string|email',
            'password'      =>  'required|string|min:6'
        ]);
        $User = Admin::where('email', '=', $request->email)->first();

        if ($validator->fails()) {
            return back()->withErrors([
                'email' => 'Email is required.',
                'password' => 'Password is required.',
            ]);
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect(route('dashboard'));
                // return response()->json(['status' => 'Fail', 'message' => 'Invalid Credentials. Please try again with correct credentials.']);
            }
        }
    }
}
