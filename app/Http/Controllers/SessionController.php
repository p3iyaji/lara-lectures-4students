<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

   public function store()
   {
    //validate
    $validated = request()->validate([ 
        'email'=> ['required'],
        'password'=> ['required'],
        ]);
    //attempt to login
        if (! Auth::attempt($validated))
        {
            throw ValidationException::withMessages([
                'email'=> 'sorry, those credentials do not match',
            ]);
        }

    //regenerate session token
    //prevents session hijacking so that even if someone has your old token it wont work whenever you signin
        request()->session()->regenerate();

    // redirect
    return redirect('/jobs');
   }

   public function destroy()
   {
        Auth::logout();

        return redirect("/");
   }
}
