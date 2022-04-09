<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function Dashboard(){
        return view('dashboard');
    }

    public function ViewDesk(){
        return view('sidemenu');
    }

    public function usersRegistraton(){
        return view('auth.registration');
    }

    public function storeRegister(Request $request)
    {
        // dd($request);
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required','email','regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)com$/','unique:users'],
            'password' => 'required|min:6',
            'repeatpassword' => 'required|same:password|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('/customauth/usersLogin')->with('success','Registration created successfully.');
    }

    public function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
    }

    public function usersLogin(){
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => ['required','regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|yahoo)\.com$/'],
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/customauth/Dashboard')
                        ->with('status','You have Successfully loggedin');
        }
  
        return redirect("/customauth/usersLogin")->withSuccess('Oppes! You have entered invalid credentials');

    }

}
