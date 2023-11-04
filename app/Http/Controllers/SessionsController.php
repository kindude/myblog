<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionsController extends Controller
{

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => ['required', Rule::exists('users','email')],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes)){
            session() -> regenerate();
            return redirect('/posts')->with('success', 'Welcome!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your email could not be verified']);
    }

    public function destroy(){

        auth()->logout();
        return redirect('/posts')->with('success', 'GoodBye');
    }
}
