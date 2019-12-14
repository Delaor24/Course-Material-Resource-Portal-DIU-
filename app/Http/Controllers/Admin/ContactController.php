<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class ContactController extends Controller
{
    public function __construct(){
    	return $this->middleware('auth:admin');
    }
    public function index(){
    	$contacts = Contact::all();
    	return view('backEnd.admin.contactUs.index',compact('contacts'));
    }
     public function delete($id){
    	$contact = Contact::findOrFail($id);
    	$contact->delete();
    	Toastr::success('Admin incomming Mail deleted !!','success');
    	return redirect()->route('admin.contact.index');

    }
}
