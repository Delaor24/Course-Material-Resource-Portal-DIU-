<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function __construct(){
        return $this->middleware('auth:web');
    }
    
    public function index(){
    	return view('backEnd.users.dashboard');
    }
}
