@extends('layouts.login')

@section('content')
	
		<div class="ajaxLoading"></div>
	    
		<div class="form-signin">
			
			<p class="message alert alert-danger " style="display:none;"></p>	
	 
		    	@if(Session::has('status'))
		    		@if(session('status') =='success')
		    			<p class="alert alert-success">
							{!! Session::get('message') !!}
						</p>
					@else
						<p class="alert alert-danger">
							{!! Session::get('message') !!}
						</p>
					@endif		
				@endif

			<ul class="parsley-error-list">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>		
	

		
		<div   id="tab-sign-in">




	 		{!! Form::open(array('url'=>'user/signin', 'class'=>'','id'=>'LoginAjax' , 'parsley-validate'=>'','novalidate'=>' ')) !!}
	 		<form action="user/signin" id="LoginAjax" onsubmit="return validateRecaptcha();">

	 		<label for="inputEmail" class="sr-only">Email address</label>
	      	<input type="email" id="inputEmail" class="form-control"  name="email"  placeholder="{{ __('core.email') }}" required autofocus>
	      	<label for="inputPassword" class="sr-only">Password</label>
	      	<input type="password" id="inputPassword"  name="password" class="form-control" placeholder="{{ __('core.password') }}" required>
	      	<div class="checkbox pt-3 mb-3">
		        <label>
		          <input type="checkbox" name="remember" value="1"  style="display: inline-block;" /> Remember me
		        </label>
		      </div>


			<!--@if(config('sximo.cnf_recaptcha') =='true') -->
			<!--<div class="form-group has-feedback  animated fadeInLeft delayp1">-->
			<!--	<label class="text-left"> Are u human ? </label>	-->
			<!--	<div class="g-recaptcha" data-sitekey="{{config('sximo.cnf_recaptchapublickey')}}"></div>-->
				
			<!--	<div class="clr"></div>-->
			<!--</div>	-->
		 <!--	@endif	-->

		 	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> 	
	
		   </form>			
		</div>
		

	</div>
	
 

<script type="text/javascript">
	$(document).ready(function(){

		$('.forgot').on('click',function(){
			$('#tab-forgot').toggle();
			$('#tab-sign-in').toggle();
		})
		var form = $('#LoginAjax'); 
		form.parsley();
		form.submit(function(e){
		  //   if(grecaptcha.getResponse() === "") {
    //             e.preventDefault();
    //             alert('Error: Please Validate The Captcha First!');
    //             return;
    //         } 
			
			if(form.parsley().isValid()){			
				var options = { 
					dataType:      'json', 
					beforeSubmit :  showRequest,
					success:       showResponse  
				}  
				$(this).ajaxSubmit(options); 
				return false;
							
			} else {
				return false;
			}		
		
		});

	});

function showRequest()
{
	$('.ajaxLoading').show();		
}  
function showResponse(data)  {		
	
	if(data.status == 'success')
	{
		window.location.href = data.url;	
		$('.ajaxLoading').hide();
	} else {
		$('.message').html(data.message)	
		$('.ajaxLoading').hide();
		$('.message').show(data.message)	
		return false;
	}	
}	
</script>

@stop