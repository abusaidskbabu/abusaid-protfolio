@include('layouts.default.header')	
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>{{ $single->title }}</h2>
					<ul class="breadcumb">
						<li><a href="/">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="/">Initiative</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>{{ $single->title }}</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>

@if (!empty($single))
	<section class="event-feature sec-padding bg-color-fa">
		<div class="container">
			<div class="row">
	          <div class="col-sm-12">
	            <div class="featured-causes">
	              <div class="row">
	                <div class="col-sm-12">
	                  <div class="thumb">
	                    <img class="full-width" src="{{ url('/') }}/public/theme/img/causes/{{ $single->image }}" alt="">
	                  </div>
	                </div>
	                <div class="col-sm-12">
	                  <div class="causes-details clearfix p_30">
	                    <h2 class="text-black mb_20">{{ $single->title }}</h2>
	                    <p class="font-16">{!! $single->description !!}</p>
	                    <div class="pull-left">
		                    <a class="thm-btn btn-xs" href="#">Donate Now</a>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
		</div>
	</section>
@endif
@include('layouts.default.template.sections.save-children')
@include('layouts.default.template.sections.client_section')
@include('layouts.default.footer')