<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function login() {
        return view('auth.login');
    }


    public function storelogin()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withError('The email or password is incorrect, please try again');
        }
        
        return redirect()->to('/');
    }

    public function destroySession() {
        auth()->logout();

        return redirect()->to('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $hasUser = User::query()->where('email', request('email'))->first();

        if($hasUser == null)
        {
            $user = User::create(request(['name', 'email', 'password']));
            
            auth()->login($user);
            
            return redirect()->route('home.index');
        }
        else
        {
            return redirect()->route('register')->with('error', 'Error with credentials');
        }
        
    }
}