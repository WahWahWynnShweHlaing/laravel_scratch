<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * create function
     * 
     */
    public function create()
    {
        return view('register.create');
    }

    /**
     * store function
     * 
     */
    public function store()
    {
        // var_dump(request()->all());
        $attributes = request()->validate([
                        'name' => 'required|max:255',
                        'username'=>'required|min:3|max:255|unique:users,username',
                        'email'=> 'required|email|max:255',
                        'password' => 'required|max:255|min:7'
                    ]);

        // $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        // session()->flash('success','Your account has been created.');

        return redirect('/')->with('success','Your account has been created.');
    }
}
