<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Check user role and redirect accordingly
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->route('products.index');
                } else {
                    return redirect()->route('account.dashboard');
                }
            } else {
                return redirect()->route('account.login')->withErrors('Either email or password is incorrect');
            }
        } else {
            return redirect()->route('account.login')->withInput()->withErrors($validator);
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->passes()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer'; // Default role
            $user->save();

            return redirect()->route('account.login')->with('success', 'You have registered successfully');
        } else {
            return redirect()->route('account.register')->withInput()->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
