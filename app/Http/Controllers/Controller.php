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

    public function store(Request $request){
        $this->validate($request, [
            'name' =>'required',
            'email' =>'required',
            'password' =>'required',
        ]);

        User::create($request->all());
        return redirect()->route('user.store')->with('success', 'created successfully');
    }

    public function edit(User $user){
        return view('edit', ['user'=>$user]);
    }


    public function update(Request $request, User $user){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->update($request->all());
        // $user->name = $request->get('name');
        // $user->email = $request->get('email');
        // $user->save();
        return redirect()->route('user.edit',[$user->id])->with('success', 'updated successfully');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('user.delete')->with('success', 'deleted successfully');
    }
}
