<?php 

namespace App\Controllers;
use App\Models\User;
use Core\Request;
use Core\BaseController;

class UsersController extends BaseController{
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

    /**
     * Store a new user
    */
    public function store(){
        User::create(Request::only(['name']));

        return Request::redirect('');
    }

    /**
     * Delete a given user
    */
    public function delete($user){
        User::delete($user);

        return Request::redirect('');
    }

    /**
     * Update a given user's data
    */
    public function update($user){
        User::update($user, Request::only(['name']));

        return Request::redirect('');
    }
}