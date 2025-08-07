<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
   
    }

//create New User
public function store(Request $request){
    $formFields = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required', 'email', Rule::unique('users', 'email')],
        'password' => 'required|confirmed |min:6',
        'role' => 'required'
    ]);

    // hash password
    $formFields['password'] = bcrypt($formFields['password']);

    $formFields['role'] = $request->role == 'recruiter' ? 0 : 1;
    // dd($formFields);
    //create user
    // dd($formFields);
    $user = User::create($formFields);

    auth()->login($user);

    return redirect('/')->with('message', 'User created and logged in');
}

//logout user

public function logout(Request $request){
    auth()->logout();
    // $request->session->invalidate();
    // $request->session->regenerateToken();
    return redirect('/')->with('message', 'you have been logout');
}

//show login from 

public function login(){
    return view('users.login');
}

//Authentication User

 public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

    if(auth()->attempt($formFields)){
        $request->session()->regenerate();

        return redirect('/')->with('message', 'you are now logged in');
        }
        return back()->withErrors(['email'=> 'invalid Credentials '])->onlyinput('email');
 }


}
