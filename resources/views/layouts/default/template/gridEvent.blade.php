@include('layouts.default.header')
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Events</h2>
					<ul class="breadcumb">
						<li><a href="index-2.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Events Grid</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="event-feature sec-padding bg-color-fa pb_60">
		<div class="container">
			<div class="row">
			    @if (!empty($upcoming))
	            @foreach ($upcoming as $data)
				<div class="col-sm-6 col-md-4">
	              <div class="event border-1px mb_30">
	                <div class="row">
	                  <div class="col-sm-12">
	                    <div class="event-thumb">
	                      <div class="thumb">
	                        <img class="full-width" src="{{ asset('uploads/images/'.$data->image)  }}" alt="">
	                      </div>
	                      <ul class="event-date">
	                        <li class="date"><?php echo date("d", strtotime($data->upload_time))?></li>
	                        <li class="month"><?php echo date("F", strtotime("$data->upload_time")); ?></li>
	                      </ul>
	                    </div>
	                  </div>
	                  <div class="col-sm-12">
	                    <div class="event-content p_20">
	                      <h4 class="event-title"><a href="{{ route('event.single', $data->id)}}">{{ $data->title }}</a></h4>
	                      <ul class="event-held list-inline">
	                        <li class="text-555"><i class="fa fa-clock-o"></i> <?php echo date("h : i a", strtotime("$data->upload_time")); ?></li>
	                        <li class="text-555"> <i class="fa fa-map-marker"></i> {{ $data->location }}</li>
	                      </ul>
	                      <p>{{ \Illuminate\Support\Str::limit($data->short_description, 80) }}</p>
	                      <a class="text-thm" href="{{ route('event.single', $data->id)}}"> Read More </a>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            @endforeach 
	            @endif 
	        </div>
			<div class="col-sm-12">
				<!--Pagination-->
				<div class="pager-outer clearfix text-center mt_30 mb_0">
				    {{ $upcoming->links() }}
				</div>
			</div>
		</div>
	</section>


	<section class="overlay-white sec-padding parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 promote-project text-center">
					<h3>Save Children From Hunger</h3>
					<div class="sec-title colored text-center">
						<span class="decor">
							<span class="inner"></span>
						</span>
					</div>
					<h2>Became a part of the world lorem ipsum</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quaerat atque, dolore. Amido ipsum dolor sit amet, consectetur adipisicing elit. Numquam quaerat atque, dolore.Lorem ipsum dolor sit amet, consectetur.</p>
					<a href="#" class="thm-btn">Donate Now</a>
                    <a href="#" class="thm-btn inverse">Read More</a>
				</div>
			</div>
		</div>
	</section>
@include('layouts.default.template.sections.client_section')
@include('layouts.default.footer')