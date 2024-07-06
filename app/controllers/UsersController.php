<?php 

namespace App\Controllers;
use App\Models\User;

class UsersController extends Controller{
    /**
     * Display a listing of users
    */
    public function index(){
        $users = User::get();

        return view('users/index', compact('users'));
    }

    /**
     * Display one user
    */
    public function show($user){
        $user = User::find($user);
        
        return view('users/show', compact('user'));
    }
}