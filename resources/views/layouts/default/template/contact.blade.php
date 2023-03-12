@include('layouts.default.header')
<!--<section class="hidden_section newspage contact_page"></div>-->
<style>
#sub{
	outline:0;
	color:#fff;
	border-radius:25px;
}
.info-item h4{
    font-size: 15px;
    line-height: 24px;
}
.mymap{
	height: 550px;	
}
</style>
<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="wpo-breadcumb-area" id="contact_page">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="wpo-breadcumb-wrap">
					<h2>Contact Us</h2>
					<ul>
						<li><a href="{{ route('index') }}">Home</a></li>
						<li><span>Contact</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .wpo-breadcumb-area end -->

<!-- start wpo-contact-form-map -->
<section class="wpo-contact-form-map section-padding">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="contact-form">
							<h2>Get In Touch</h2>
							<small style="color:#f00;">* All star mark fields are required.</small>
							<form action="{{ route('contact.data') }}" method="post" id="contact_form">
								
								<div>
									@csrf
									<input type="text" class="form-control" name="first_name"  placeholder="First Name *">
									<small class="text-danger">{{ $errors->first('first_name') }}</small>
								</div>
								<div>
									<input type="text" class="form-control" name="last_name" placeholder="Last Name *">
									<small class="text-danger">{{ $errors->first('last_name') }}</small>
								</div>
								<div class="clearfix">
									<input type="email" class="form-control" name="email"  placeholder="Email *">
									<small class="text-danger">{{ $errors->first('email') }}</small>
								</div>
								<div>
									<input type="text" class="form-control" name="phone"  placeholder="Phone">
									<small class="text-danger">{{ $errors->first('phone') }}</small>
								</div>
								<div>
									<textarea class="form-control" name="message" placeholder="Message...  *"></textarea>
									<small class="text-danger">{{ $errors->first('message') }}</small>
								</div>
								
         			            @if(config('sximo.cnf_recaptcha') =='true') 
                    			<div class="form-group has-feedback  animated fadeInLeft delayp1">
                    				<label class="text-left"> Are u human ? </label>	
                    				<div class="g-recaptcha" data-sitekey="{{config('sximo.cnf_recaptchapublickey')}}"></div>
                    				<div class="clr"></div>
                    			</div>	
                    		 	@endif	
								
								<div>
									<input id="sub" type="submit" class="btn btn-info btn_site" value="Message Send">
								</div>
           
							</form>
							<div class="row">
								<div class="col-md-12">
									@if(Session::has('message'))
										<p class="alert alert-success" style="margin-top:10px;">{{ Session::get('message') }}</p>
									@endif
								</div>
							</div>
						</div>                            
					</div>
					<div class="col col-lg-6 col-md-6 col-sm-12 col-12 mymap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.760176568114!2d90.39686335415217!3d23.794049383219846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c713f7a7d653%3A0x81d60de3c6230ad8!2s1%2C%20House%20%23%2038!5e0!3m2!1sen!2sbd!4v1633947782119!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>

				<div class="wpo-contact-info">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="info-item">
								<div class="info-wrap">
									<div class="info-icon">
										<i class="ti-world"></i>
									</div>
									<div class="info-text">
										<span></span>
										<span>{{ $setting->address }}</span>
									</div>
								</div>
							</div>
							</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="info-item">
								<div class="info-wrap">
									<div class="info-icon-2">
										<i class="fi flaticon-envelope"></i>
									</div>
									<div class="info-text">
										<span> <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a> </span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">
							<div class="info-item">
								<div class="info-wrap">
									<div class="info-icon-3">
										<i class="ti-headphone-alt"></i>
									</div>
									<div class="info-text">
										<span>{{ $setting->phone }}</span>
									</div>
								</div>
							</div>   
							</div>
						</div>
				</div>
			</div>
		</div>
	</div> <!-- end container -->
</section>
<!-- end wpo-contact-form-map -->

<script>
 jQuery('#contact_form').on('submit',function(e){
      if(grecaptcha.getResponse() === "") {
        e.preventDefault();
        alert('Error: Please Validate The Captcha First!');
     }
  });    
</script>




<script>
@php $banners = DB::table('con_banner_slider')->where('status',1)->where('type','contact')->get();@endphp
var counter = 0;
var maxCount = <?= count($banners); ?>;
function setBckImage(){
    if(counter<maxCount){
        counter++;
    } else {
        counter=1;
    }

    switch (counter){
        @php $caseCounter = 1 @endphp
        @foreach($banners as $banner)
        case <?= $caseCounter?>:
            jQuery('.wpo-breadcumb-area').css({"background-image" : "url({{'/uploads/images/banner/'.$banner->image}})"});
        break;
        @php $caseCounter++ @endphp
        @endforeach
        
    }
}

setInterval(setBckImage, 3000);
</script>
@include('layouts.default.footer')       