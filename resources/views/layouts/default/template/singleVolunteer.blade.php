@include('layouts.default.header')
<style>
.myinput {
    padding:5px;
    text-align: left;
}

.myinput input::placeholder {
  color:black;
}
.myinput textarea::placeholder {
  color:black;
}
.myinput input{
    width: 100%;
    padding: 8px; 
    font-family: initial;
}
.myinput textarea{
    font-family: initial;
}
.myinput textarea{
    width: 100%;
    height: 100px;
    padding: 10px;
}
.modal-header{
    text-align:left;
}
.modal-header h5{
    font-size: 20px;
    font-weight: 700;
    color: #000;
}
.modal-header .close {
    margin-top: -25px;
}
.text-danger {
    color: #c70501;
}
</style>


	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>{{ $volunteer->name }}</h2>
					<ul class="breadcumb">
						<li><a href="/">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Volunteer Profile</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>
	@if(!empty($volunteer))
	<section class="sec-padding volunteer-profile">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="{{ url('/') }}/public/theme/img/team/{{ $volunteer->image }}" alt="" width="100%">
				</div>
				<div class="col-md-8 single-team-member">
					<h3>{{ $volunteer->name }}</h3>
					<span>{{ $volunteer->profession }}</span>
					<p>{{ strip_tags($volunteer->description) }}</p>
					<ul class="infos">
						<li><span style="float: left;">Hobby</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $volunteer->hobby }}</span></li>
						<li><span style="float: left;">Degrees</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $volunteer->degree }}</span></li>
						<li><span style="float: left;">Experience</span> <span>{{ $volunteer->experience }}</span></li>
						<li><span style="float: left;">Training</span> <span>&nbsp;&nbsp;&nbsp;&nbsp;{{ $volunteer->training }}</span></li>
						<li><span style="float: left;"> Prefered Day </span> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $volunteer->work_day }}</span></li>
					</ul>
					<ul class="social">
						<li><a href="{{ $volunteer->facebook }}"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ $volunteer->twitter }}"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{ $volunteer->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="{{ $volunteer->googleplus }}"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	@endif
	


	<section style="z-index:1" class="home-appointment-form volunteer-profile">
		<div class="container">
			<div class="row">
                <div class="col-md-9">
                    <h3 style="margin: 11px 0;">Became a part of the world by joined our volunteer group.</h3>
                        @if(Session::has('message'))
                            <p class="alert alert-success" style="margin-top:10px;">{{ Session::get('message') }}</p>
                        @endif
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalScrollable">
                        Join Now
                    </button>
                </div>
            </div>
		</div>
    </section>
    
                <!--========Modal=========start-------->
                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" style="top: 45px;height:85%;">
                    <div class="modal-dialog modal-dialog-scrollable" role="document" >
                      <form action="{{ route('volunteer.create.account') }}" method="post" enctype="multipart/form-data"> 
                      @csrf
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalScrollableTitle">Create account as a volunteer</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                       
                          <div class="modal-body" style="padding: 15px;">
                            <div class="container-fluid">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="name" placeholder="Name.." required="" />
                                      <small class="text-danger">{{ $errors->first('name') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="profession" placeholder="Profession.." required="" />
                                      <small class="text-danger">{{ $errors->first('profession') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="email" name="email" placeholder="Email.." required="" />
                                      <small class="text-danger">{{ $errors->first('email') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="hobby" placeholder="Hobby.." required="" />
                                      <small class="text-danger">{{ $errors->first('hobby') }}</small>
                                  </div>
                                  
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="degree" placeholder="Degree.." required="" />
                                      <small class="text-danger">{{ $errors->first('degree') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="experience" placeholder="Experience.." required="" />
                                      <small class="text-danger">{{ $errors->first('experience') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="training" placeholder="Training.." required="" />
                                      <small class="text-danger">{{ $errors->first('training') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="work_day" placeholder="Work day.." required="" />
                                      <small class="text-danger">{{ $errors->first('work_day') }}</small>
                                  </div>
                                  
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="facebook" placeholder="Facebook link.. (optional)"  />
                                      <small class="text-danger">{{ $errors->first('facebook') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="twitter" placeholder="Twitter link.. (optional)"  />
                                      <small class="text-danger">{{ $errors->first('twitter') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="linkedin" placeholder="Linkedin link.. (optional)"  />
                                      <small class="text-danger">{{ $errors->first('linkedin') }}</small>
                                  </div>                                
                                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 myinput">
                                      <input type="text" name="googleplus" placeholder="Googleplus link.. (optional)" />
                                      <small class="text-danger">{{ $errors->first('googleplus') }}</small>
                                  </div>
                                  
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 myinput">
                                      <textarea type="text" name="short_description" placeholder="Short description.." required=""></textarea>
                                      <small class="text-danger">{{ $errors->first('short_description') }}</small>
                                  </div>
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 myinput">
                                      <textarea type="text" name="description" placeholder="Description.." required=""></textarea>
                                      <small class="text-danger">{{ $errors->first('description') }}</small>
                                  </div>
                                  
                                 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 myinput">
                                      <input type="password" name="password" placeholder="Your account password.." required="" />
                                      <small class="text-danger">{{ $errors->first('password') }}</small>
                                  </div>              
                                  
                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 myinput">
                                      <label style="float:left;font-family: initial;color:black;">Image</label>
                                      <input type="file" name="image" placeholder="Image" required="" />
                                      <small class="text-danger">{{ $errors->first('image') }}</small>
                                  </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                  <!--========Modal=========End-------->


@include('layouts.default.template.sections.client_section')
@include('layouts.default.footer')