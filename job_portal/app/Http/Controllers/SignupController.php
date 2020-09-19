<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SignupController extends Controller
{
    public function index(Request $req){

		
			return view('signup.index');
	  
	}

	public function company_signup(Request $request){

		
		$this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'business_name'=>'required',
            'email'=>'required |unique:company|email',
            'password'=>'required',
            
            
        ]);
        $data=array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['business_name']=$request->business_name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        
		DB::table('company')->insert($data);
		return redirect('/')->with('alert', 'Company Added Successfully!');
	   
}

public function applicant_signup(Request $request){


	$this->validate($request,[
		'first_name'=>'required',
		'last_name'=>'required',
		'email'=>'required |unique:applicant|email',
		'password'=>'required',
		
		
	]);
	$data=array();
	$data['first_name']=$request->first_name;
	$data['last_name']=$request->last_name;
	$data['email']=$request->email;
	$data['password']=$request->password; 
	$data['profile_pic']='user.png';
	DB::table('applicant')->insert($data);
	
		
	return redirect('/')->with('alert', 'Applicant Added Successfully!');
	   

}
}
