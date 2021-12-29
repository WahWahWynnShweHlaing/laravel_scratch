<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    /**
     * create function
     * 
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * store function
     * 
     */
    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success','Welcome Back');
        }

        throw ValidationException::withMessages(['email' => 'Your email is invaild!!!!']);
        // return back()->withErrors(['email' => 'Your email is invaild!!!!']);
    }

    /**
     * destory function
     * 
     */
    public function destory()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }
}
