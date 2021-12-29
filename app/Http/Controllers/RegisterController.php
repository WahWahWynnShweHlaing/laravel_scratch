<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        User::create($attributes);

        return redirect('/');
    }
}
