<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $req){

		if($req->session()->has('company_id')){
			return view('company.index');
		}else{
			return redirect('/');
        }
        
	}

	public function company_addJob(Request $req){

		if($req->session()->has('company_id')){
			return view('company.add_job');
		}else{
			return redirect('/');
        }
        
	}


	public function company_addJobPost(Request $request){

		$company_id=$request->session()->get('company_id');

		$this->validate($request,[
			'job_title'=>'required',
			'job_description'=>'required',
			'salary'=>'required ',
			'location'=>'required',
			'country'=>'required',
			
			
		]);
		$data=array(); 
		$data['company_id']=$company_id;
		$data['job_title']=$request->job_title;
		$data['job_description']=$request->job_description;
		$data['salary']=$request->salary;
		$data['location']=$request->location;
		$data['country']=$request->country;
		
		DB::table('jobs')->insert($data);
		return redirect('/company')->with('alert', 'Job Added Successfully!');
		   
	
	}

	public function company_viewJob(Request $request){

		if($request->session()->has('company_id')){
			$company_id=$request->session()->get('company_id');
			
			$jobs=DB::table('jobs')
				->where('company_id',$company_id)
				->get();
			return view('company/view_job',compact('jobs'));
		}else{
			return redirect('/');
        }
        
	} 

	public function company_viewApplicant(Request $request){

		if($request->session()->has('company_id')){
			$company_id=$request->session()->get('company_id');
			$job_applications=DB::table('jobs')
				->join('job_application','jobs.job_id','=','job_application.job_id')
				->where('jobs.company_id',$company_id)
				->get();
			return view('company/view_applicant',compact('job_applications'));
		}else{
			return redirect('/');
        }
        
	}
}
