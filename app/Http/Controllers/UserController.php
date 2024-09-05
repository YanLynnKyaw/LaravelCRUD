<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index',compact('users'));
    }
    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $request->validate([
            'full_name'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone_number'=>'required',
            'password' => 'required|confirmed|min:4|max:8',

        ]);
        try{
            $new_user = new User;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();
            
            return redirect('/users')->with('success','User Added Successful');
        } catch (\Exception $e){
            return redirect('/user/add')->with('fail',$e->getMessage());
        }
    }

    public function editForm($id){
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    public function edit(Request $request){
        $request->validate([
            'full_name'=>'required|string',
            'email'=>'required|email',
            'phone_number'=>'required ',
        ]);

        try{ 
            $update_user = User::where('id',$request->user_id)->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number
            ]);
            return redirect('/users')->with('success','User Updated Successful');
        } catch (\Exception $e){
            return redirect('/user/edit')->with('fail',$e->getMessage());
        }
    }

    public function delete($id){
        try {
            User::where('id',$id)->delete();
            return redirect('/users')->with('success','User Deleted Successful!');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail','User Delete fail');
        }
    }

}
