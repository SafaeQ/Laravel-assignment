<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (Auth::user()->role) {
            case 'super_admin':
                return redirect()->route('named_route');
                break;
            case 'admin':
                return redirect()->route('named_route');
                break;
            case 'user':
                return redirect()->route('named_route');
                break;

            default:
                # code...
                break;
        }
        return view('home');
    }
    public function superAdminHome(){
        return view('super-admin-home');
    }
    public function adminHome(){
        return view('admin-home');
    }
}
