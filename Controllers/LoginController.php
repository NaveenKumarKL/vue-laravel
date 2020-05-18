<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
      $request -> validate([
          'email' => ['required'],
          'password' => ['required']
      ]);
      if (Auth::attempt($request ->only('email','password'))) {
        return response()->json(Auth::user(), 200);
      }throw VaidationException::withMessages([
          'email' => ['The provided credentials are incorrect.']
      ]);
    }


    public function logout()
    {
       Auth::logout();
    }
    public function index()
    {
        $User = User::all()->toArray();
        return array_reverse($User);
    }
    public function edit($id)
    {   
      $User = User::find($id);
      return response()->json($User);
    }
    public function update($id, Request $request)
    {
      print_r($id);
        $User = User::find($id);
        $User->update($request->all());
  
        return response()->json('The User successfully updated');
    }
    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();

        return response()->json('The user successfully deleted');
    }
 
}
