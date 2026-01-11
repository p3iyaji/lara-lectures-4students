<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $validated = request()->validate([
            'email'=> ['required'], //email_confirmation
            'password'=> ['required', Password::min(6), 'confirmed'], //password_confirmation
            'name' => ['required','string'],
           
        ]);
        //create new user
        // User::create([
        //     'email'=> request('email'),
        //     'password'=> request('password'),
        //     'first_name'=> request('first_name'),
        //     'last_name'=> request('last_name'),
        //     ]);
        
        $user = User::create($validated);
        //login
        Auth::login($user);

        //redirect somewhere
        return redirect('/jobs');
    }
}
