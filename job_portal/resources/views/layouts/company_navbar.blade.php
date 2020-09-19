<div class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">Brand</a>
      </div>
      <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('/company') }}">Company Home</a></li>
          <li><a href="{{ URL::to('/company_addJob') }}">Post Job</a></li>
          <li><a href="{{ URL::to('/company_viewJob') }}">View Your Jobs</a></li>
          <li><a href="{{ URL::to('/company_viewApplicant') }}">View Applicants</a></li>
          <li style="text-align:left;"><a href="{{ URL::to('/logout') }}">Logout</a></li>
         
          
          </ul>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>