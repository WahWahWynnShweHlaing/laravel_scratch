<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function index(Newsletter $newsletter){
        request()->validate(['email' => 'required|email']);

            try{
                Log::info("invoke con");
                // $newsletter = new Newsletter();
                $newsletter->subscribe(request('email'));
            }catch(\Exception $e){
                throw ValidationException::withMessages([
                    'email'=> 'this email is not be added to news letter',
                ]);
            }
            return redirect('/')->with('success' , 'You r now singed up for our newsletter!!');
    }
}
