<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ProfileController extends Controller
{
   
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

	public function change_pic(Request $request)
	{
		$applicant_id=$request->session()->get('applicant_id');
		$applicant_info=DB::table('applicant')
				->where('applicant_id',$applicant_id)
				->first();

 $image = $request->file('applicant_image');

if(($image)){
 $data=array();
 
$image_name=$image->getClientOriginalName();
$image_full_name=$image_name;
$upload_path='img/';
$image_url=$upload_path.$image_full_name;
$success=$image->move($upload_path,$image_full_name);
$data['profile_pic']=$image_name;

DB::table('applicant')
->where('applicant_id',$applicant_id)  
->update($data);

return Redirect()->back();    

}
			   
} 


public function add_skills(Request $request)
	{
		$applicant_id=$request->session()->get('applicant_id');
		
		$data=array();
        $data['skills']=$request->skills;
		DB::table('applicant')
        ->where('applicant_id',$applicant_id)
        ->update($data);

return Redirect()->back();    

}
		

public function change_resume(Request $request)
	{
		
$applicant_id=$request->session()->get('applicant_id');
	
 $resume = $request->file('applicant_resume');

if(($resume)){
 $data=array();
 
$resume_name=$resume->getClientOriginalName();
$resume_full_name=$resume_name;
$upload_path='resume/';
$resume_url=$upload_path.$resume_full_name;
$success=$resume->move($upload_path,$resume_full_name);
$data['resume']=$resume_name;

DB::table('applicant')
->where('applicant_id',$applicant_id)  
->update($data);

return Redirect()->back();  

}
else{
	return 'no resume';
}
			   
} 



}
