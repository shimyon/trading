<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function userList()
    {
        $users = User::all(); 
        return view('user.userList',compact('users'));
    }

    public function userFormAdd()
    {
      return view('user.addUser');
    }

    public function userFormStore(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required','email','regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|yahoo)\.com$/','unique:users'],
        ]);
         User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt('123456'),
            'role' => 'user'
        ]);
        //  dd($show);
   
        return redirect('/user/userList')->with('status', 'User is successfully saved');
    }

    public function edituser(Request $request,$id)
    {
        $users = User::findOrFail($id);
        return view('user.editUser',compact('users'));
    }

    public function userFormupdate(Request $request,$id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required','email','regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|yahoo)\.com$/'],
        ]);
         User::find($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt('123456'),
            // 'role' => 'user'
        ]);
        //  dd($show);
   
        return redirect('/user/userList')->with('status', 'User successfully Updated');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user/userList')->with('status', ' User Data is successfully deleted');
    }

    public function editpassword(Request $request,$id)
    {
        $users = User::select('users.id',
        DB::RAW('concat(firstname, " ", lastname) AS user_name'), 
        )
        ->where('users.id', $request->id)->first();
        return view('user.editpassword',compact('users'), [
        'user_name' => $users->user_name,
        ]);
        //  dd($users);
    }

    public function password(Request $request,$id)
    {  
        $users = User::findOrFail($id);
        // $users->get('id');
        // dd($users);
        $request->validate([
            'password' => 'required|min:6',
            'repeatpassword' => 'required|same:password|min:6',
        ]);
        //  dd($request);

        User::find($id)->update([
            'password' => bcrypt($request->password),
        ]);
        // dd($id);
        return redirect('/user/userList')->with("status", "Password changed successfully!");
    }

}
