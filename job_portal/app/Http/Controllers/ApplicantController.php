<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ApplicantController extends Controller
{
    public function index(Request $req){

		if($req->session()->has('applicant_id')){
			return view('applicant.index');
		}else{
			return redirect('/login');
        }
        
	}

	public function applicant_viewJob(Request $request){

		if($request->session()->has('applicant_id')){
			$jobs=DB::table('jobs')
				->get();
			return view('applicant/view_job',compact('jobs'));
		}else{
			return redirect('/');
        }
        
	}

	public function applicant_profile(Request $request){
	
		$applicant_id=$request->session()->get('applicant_id');
		if($request->session()->has('applicant_id')){
			$applicant_info=DB::table('applicant')
				->where('applicant_id',$applicant_id)
				->first();
			
				return view('applicant/profile',compact('applicant_info'));
		}else{
			return redirect('/');
        }
        
	}


	public function applicant_apply(Request $request,$job_id){
	
		$applicant_id=$request->session()->get('applicant_id');
		
		$applicant_info=DB::table('applicant')
				->where('applicant_id',$applicant_id)
				->first();
		if($applicant_info->resume){
		$data=array(); 
		$data['job_id']=$job_id;
		$data['applicant_id']=$applicant_id;
		
		DB::table('job_application')->insert($data);
		
			
		return redirect('/applicant')->with('alert', 'Job Applied Successfully!');
		}
		else{
			return redirect('/applicant_profile')->with('alert', 'Please upload resume to apply!');
		}
        
	}
}
