<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

class SessionsController extends Controller
{
    public function destory()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }
}
