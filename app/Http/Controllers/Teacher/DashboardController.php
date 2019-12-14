<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct(){
		return $this->middleware('auth:teacher');
	}
    public function index(){
    	return view('backEnd.teachers.dashboard');
    }
}
