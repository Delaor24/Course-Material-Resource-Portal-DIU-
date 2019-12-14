<?php

namespace App\Http\Controllers\frontEnd;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use App\Notifications\ContactNotificationToAdmin;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
class FrontEndController extends Controller
{
    public function index(){
    	return view('frontEnd.pages.index');
    }
    public function aboutUs(){
    	return view('frontEnd.pages.about-us');
    }

    public function contactForm(){
    	return view('frontEnd.pages.contact-us');
    }
    public function contactStore(Request $r){
    	$this->validate($r,[
    		'name' => 'required',
    		'email'=> 'required|email',
    		'message' => 'required',
    		'address' => 'required',
    	]);


    	$contact = Contact::create($r->all());

    	$admin = Admin::findOrFail(1);
    	$admin->notify(new ContactNotificationToAdmin($contact));

    	Toastr::success('Your message send successfully !!','success');
    	return redirect()->route('contactUs');

    }

}
