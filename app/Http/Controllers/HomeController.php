<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */

    public function index(){
         return view('home/home');
    }   
    public function factory_expenses(){
        return view('home/factory_expenses');
    }   
    public function maintenance_expenses(){
        return view('home/maintenance_expenses');
    }   
    public function earnings_loses(){
        return view('home/earnings_loses');
    }      
    public function register(){
        return view('auth/register');
    }      
    public function login(){
        return view('auth/login');
    }      
    public function reset(){
        return view('auth/password/reset');
    }
}
