<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       $user= Auth::user();
       //assign role
        $role=Role::where('slug','editor')->first();
        // assigning role
    //    $user->roles()->attach($role);

    //    dd($user->hasRole('author'));
    // aaaining permmission add post
    // $permission =Permission::first();
    // $user->permissions()->attach($permission);
    // dd($user->can('delete-post'));
        return view('home');
    }

}
