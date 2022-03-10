<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show(User $user){
        $user = User::all();
            return view('home', ['user'=>$user]);
        }

    public function create_user(){
            return view('create');
        }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('home')->with('success', 'created successfully');
    }

    public function edit($id){
        $user = User::find($id);
        return view('edit',['user'=>$user]);
    }


    public function update($id,Request $request){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('home',['user'=>$user])->with('success', 'updated successfully');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect()->route('home')->with('success', 'deleted successfully');
    }
}
