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
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);
         User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt('123456'),
            'role' => 'user'
        ]);
        //  dd($show);
   
        return redirect('/user/userList')->with('success', 'User is successfully saved');
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
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ]);
         User::find($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt('123456'),
            // 'role' => 'user'
        ]);
        //  dd($show);
   
        return redirect('/user/userList')->with('success', 'User is successfully saved');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user/userList')->with('success', ' User Data is successfully deleted');
    }

    public function editpassword(Request $request)
    {
        $data = User::select('users.id',
        DB::RAW('concat(firstname, " ", lastname) AS user_name'), 
        )
        ->where('users.id', $request->id)->first();
        return view('user.editpassword', [
        'user_name' => $data->user_name,
        ]);
    }

    public function password(Request $request,$id)
    {
        $id = $request->get('id');
        dd($id);
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(
                array(
                    'isok' => false,
                    'error' => $validator->errors()->toArray()
                )
            );
        }
        if (isset($request->id) && $request->id != 0) {
            User::where('id', $request->id)  // find your user by their email
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(
                    array(
                        'password' => bcrypt($request->password),
                    )
                );  // update the record in the DB. 
        }
        return response()->json(
            array(
                'isok' => true,
                'error' => null,
              
            )
        );
    }

}
