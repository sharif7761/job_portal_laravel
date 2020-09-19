<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LoginController extends Controller
{
    public function index(Request $req){
    	return view('login.index');
    }
    public function verify(Request $req){
        
        $this->validate($req,[
            'email'=>'required',
            'password'=>'required',
            'type'=>'required',
           
            
        ]);

 
          if($req->type=='Company'){
            $user = DB::table('company')
            ->where('email', $req->email)
            ->where('password', $req->password)
            ->first();


            if($user != null){
            
                $company_id= $req->session()->put('company_id', $user->company_id);
                 return redirect()->route('company.index')->with($company_id);
                 
                 
             }else{
                 $req->session()->flash('msg', 'invalid email/password');
                
                 return redirect('/'); 
             }

          }  
          elseif($req->type=='Applicant'){
            $user = DB::table('applicant')
            ->where('email', $req->email)
            ->where('password', $req->password)
            
            ->first();


            if($user != null){
            
                $applicant_id= $req->session()->put('applicant_id', $user->applicant_id);
                 return redirect()->route('applicant.index')->with($applicant_id);
                 
                 
             }else{
                 $req->session()->flash('msg', 'invalid email/password');
                 //return view('login.index');
                 return redirect('/'); 
             }

          }  
    }
}
