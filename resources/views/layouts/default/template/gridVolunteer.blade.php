@include('layouts.default.header')
	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Volunteer</h2>
					<ul class="breadcumb">
						<li><a href="index-2.html">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Volunteer Style One</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="sec-padding meet-Volunteer pb_30">
		<div class="container">
			<div class="row">
			    @if(!empty($volunteer))
			    @foreach($volunteer as $data)
				<div class="col-md-3">
					<div class="single-team-member mb_60">
						<div class="img-box">
							<img class="full-width" src="{{ url('/') }}/public/theme/img/team/{{ $data->image }}" alt="">
							<div class="overlay">
								<div class="box">
									<div class="content">
										<ul>
											<li><a href="{{ $data->facebook }}"><i class="fa fa-facebook"></i></a></li>
											<li><a href="{{ $data->twitter }}"><i class="fa fa-twitter"></i></a></li>
											<li><a href="{{ $data->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="{{ $data->googleplus}}"><i class="fa fa-google-plus"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<h3>{{ $data->name }}</h3>
						<span>{{ $data->profession }}</span>
						<p>{{ \Illuminate\Support\Str::limit($data->short_description, 80) }}</p>
						<a href="{{ route('volunteer.single', $data->id) }}" class="thm-btn">View Profile</a>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			<div class="col-sm-12">
				<!--Pagination-->
				<div class="pager-outer clearfix text-center mt_30 mb_0">
				    {{ $volunteer->links() }}
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