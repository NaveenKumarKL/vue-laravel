<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function register(Request $request)
  {
    $request ->validate([
        'name' => ['required'],
        'email' => ['required','email','unique:users'],
        'password' => ['required']
    ]);

    User::create([
        'name' => $request -> name,
        'email' => $request -> email,
        'password' =>Hash::make($request -> password) 

    ]);
  }
}
