@extends('layouts.applicant_header')

@section('content')
<div class="container">
    

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script> 
    

    <h1> Appplicant Profile</h1>


    <img   style="height:auto;width:100px;border-radius:50%;"  alt="{{ $applicant_info->first_name }}"  src="{{asset('img/'.$applicant_info->profile_pic)}}">
    <br>
    <form  id="popup"  method="POST" action="{{URL::to('/change_pic')}}" >
        @csrf
        <a   class="btn btn-primary btn-sm " >
            <label for="file"> 
                Update
            </label>
          <input type="file" id="file" onchange="this.form.submit()" name="applicant_image" style="display: none" />
          </a >
    </form>


      <table class='table ' style='width:100%;'>

        <tr>
        <td>
        <b> first_name : </b> 
        </td>

        <td>
        {{$applicant_info->first_name}} 
        </td>
        </tr>

        <tr>
            <th>
                last_name : 
            </th>
    
            <td>
            {{$applicant_info->last_name}} 
            </td>
            </tr>
            <tr>
                <th>
                    email : 
                </th>
        
                <td>
                {{$applicant_info->last_name}} 
                </td>
                </tr>
                <tr>
                    <th>
                        password : 
                    </th>
            
                    <td>
                    {{$applicant_info->password}} (password is shown for testing) 
                    </td>
                    </tr>

                 
                    <tr>
                        <th>
                            Resume : 
                        </th>
                
                        <td>
                           

                        @if ($applicant_info->resume)
                        {{$applicant_info->resume}}
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#resumeModal">
                            Update Resume
                          </button>  
                        @else 
                        Please Upload Resume
                         <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#resumeModal">
                            Upload Resume
                          </button>
                        @endif
                        </td>
                        </tr>

                        <tr>
                            <th>
                                Skills : 
                            </th>
                    
                            <td>
                                @if ($applicant_info->skills)
                                {{$applicant_info->skills}}
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skillModal">
                                    Update Skills
                                  </button>  
                                @else 
                                Please Update skills
                                 <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#skillModal">
                                    Add Skills
                                  </button>
                                @endif
                            </td>
                            </tr>

    </table>


    <!--Skills Modal -->
<div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <label>Enter Skills</label>
         <form action="" id="popup" method="POST">
            @csrf
         <input type="text" name="skills" placeholder="Enter skills" 
         
         @if (($applicant_info->skills)) 
         value="{{ $applicant_info->skills }}"
         @endif
         
         />

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" formaction="{{URL::to('/add_skills')}}"  class="btn btn-primary">Add Skills</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <!--Skills Modal ends-->



   <!--resume Modal -->
<div class="modal fade" id="resumeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Resume</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <label>Select Resume</label>
         <form action=""method="POST"  enctype="multipart/form-data">
            @csrf
         <input type="file" name="applicant_resume"  />

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" formaction="{{URL::to('/change_resume')}}"  class="btn btn-primary">Upload Resume</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <!--resume Modal ends-->

</div>
@endsection