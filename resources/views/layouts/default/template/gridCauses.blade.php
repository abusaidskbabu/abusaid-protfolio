@include('layouts.default.header')

	<section class="inner-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 sec-title colored text-center">
					<h2>Initiatives</h2>
					<ul class="breadcumb">
						<li><a href="/">Home</a></li>
						<li><i class="fa fa-angle-right"></i></li>
						<li><span>Initiatives</span></li>
					</ul>
					<span class="decor"><span class="inner"></span></span>
				</div>
			</div>
		</div>
	</section>


	<section class="recent-causes sec-padding pb_60">
		<div class="container">
			<div class="row rc_c">
			   @if (!empty($recentcauses))
	           @foreach ($recentcauses as $data)
	          <div class="col-sm-12 col-md-4 col-lg-4">
	            <div class="causes sm-col5-center mb_30">
	              <div class="thumb">
	                <img class="full-width" alt="" src="{{ url('/') }}/public/theme/img/causes/{{ $data->image }}">
	              </div>
	              <div class="causes-details clearfix">
	                <h4 class="title"><a href="{{route('causes.single', $data->id) }}">{{ $data->title }}</a></h4>
	                <p>{{ \Illuminate\Support\Str::limit($data->short_description, 120) }}</p>
	                <div>
	                 <a href="{{route('causes.single', $data->id) }}" class="thm-btn btn-xs"><i class="text-white"></i>Read More</a>
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
				    {{ $recentcauses->links() }}
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