@include('layouts.default.header')
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Events</h2>
					<ul class="breadcumb">
						<li><a href="/">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><a href="/event">Events</a></li>
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
					<div class="border-1px">
		              <div class="mb_30">
		                <div class="row">
		                  <div class="col-sm-12">
		                      <div class="thumb">
		                        <img class="full-width" src="{{ asset('uploads/images/'.$single->image) }}" alt="">
		                      </div>
		                  </div>
		                </div>
		              </div>
		              <div class="event">
		                <div class="row">
		                  <div class="col-xs-12 col-md-1">
		                    <div class="event-thumb">
		                      <ul class="event-date">
		                        <li class="date">
									<?php echo date("d", strtotime($single->upload_time))?>
		                        </li>
		                        <li class="month">
									<?php echo date("F", strtotime($single->upload_time)); ?>
		                        </li>
		                      </ul>
		                    </div>
		                  </div>
		                  <div class="col-xs-12 col-md-11">
		                    <div class="event-content p_20 pl_0 pt_0">
		                      <h3 class="event-title">{{ $single->title }}</h3>
		                      <ul class="event-held list-inline font-13 mb_20">
		                        <li class="text-555">
		                        	<i class="fa fa-clock-o"></i>
									<?php echo date("h : i a", strtotime($single->upload_time)); ?>
		                        </li>
		                        <li class="text-555"> <i class="fa fa-map-marker"></i> {{ $single->location }}</li>
		                      </ul>
		                      <p class="mb_20">{!! $single->description !!}</p>
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