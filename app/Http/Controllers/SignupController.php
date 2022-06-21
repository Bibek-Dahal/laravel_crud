<?php

namespace App\Http\Controllers;
use App\Http\Requests\SignupRequest;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    function signup(Request $req){
        return view('signup');
    }

    function createUser(SignupRequest $req){
        
        $validated = $req->validated();
        return view('signup');
    }
}
