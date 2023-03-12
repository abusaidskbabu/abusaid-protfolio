@include('layouts.default.header')
<!--<section class="hidden_section newspage"></div>-->
<style>
.block_image_big {
    height: 262px;
} 
@media (max-width: 767px) {
    .newspage{
        height: 240px;
    }
}
.carousel {
    margin-bottom: 50px;
}

.wpo-section-title {
    margin-top: 50px;
    
}
.news_page{
    margin-top: 40px !important;
}
.block {
    padding: 15px 5px 5px 5px;
    height: 390px;
}
</style>
<div class="container news_page">
    <div class="row">
        <div class="col-12">
            <div class="wpo-section-title">
                <h2>Latest News</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @php
            $posts = DB::table('tb_pages')->where('cid', 2)->where('status', 'enable')->orderBy('pageID', 'DESC')->paginate(6);
        @endphp
        @if ($posts)
        @foreach( $posts as $post) 
        <div class="col-md-4">
            <div class="block img-responsive">
                <a target="_blank" href="{{ url('posts/read/'.$post->alias) }}">
                    <h4 style="font-weight: 500;">{{  Str::limit($post->title, $limit = 150, $end = '..') }}</h4>
                    @php
                      
                      $from = \Carbon\Carbon::createFromTimestamp(strtotime($post->created));
                      $to = \Carbon\Carbon::now();
                    @endphp
                    <span>{{ Carbon\Carbon::createFromTimestamp(strtotime($post->created))->diff(\Carbon\Carbon::now())->days }} days ago</span>
                                    
                    <p>{{  Str::limit(strip_tags($post->note), $limit = 100, $end = '..') }}</p>
                    
                      @if(file_exists('./uploads/images/'.$post->image) && $post->image !='' )
                      <img src="{{ asset('uploads/images/'.$post->image) }}" alt="" id="newspage" class="block_image_big newspage">
                      @else
                      <img src="{{ asset('uploads/images/no-image.png') }}" alt="" id="newspage" class="block_image_big newspage">
                      @endif
                      
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

<script src="{{ asset('assets') }}/js/jquery.2.1.0.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="wpo-section-title">
                <h2>Social Feeds</h2>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col-12 col-xs-12 col-sm-12 col-md-12 col-centered">
			<div id="carousel" class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3500">
				<div class="carousel-inner">
	                @php
                        $feeds = DB::table('con_social_feed')->where('status', 1)->orderBy('id', 'DESC')->get();
                    @endphp
                    @if ($feeds)
                    @foreach ($feeds as $data)
					<div class="item @if($loop->iteration == 1) active @endif">
						<div class="carousel-col">
							<div class="block img-responsive">
                                <a target="_blank" href="{{ $data->link }}">
                                    <img class="block_image" src="{{ asset('uploads') }}/images/social/{{ $data->icon_image }}" alt="">
                                    <h4>{{  Str::limit($data->title, $limit = 15, $end = '..') }}</h4>
                                    @php
                                      
                                      $from = \Carbon\Carbon::createFromTimestamp(strtotime($data->created_at));
                                      $to = \Carbon\Carbon::now();
                                    @endphp
                                    <span>{{ Carbon\Carbon::createFromTimestamp(strtotime($data->created_at))->diff(\Carbon\Carbon::now())->days }} days ago</span>
                                    <p>{{  Str::limit($data->short_description, $limit = 70, $end = '..') }}</p>
                                    <img  class="block_image_big" src="{{ asset('uploads') }}/images/social/{{ $data->image }}" alt="">
                                </a>
                            </div>
						</div>
                    </div>
                    @endforeach
                    @endif
				</div>

				<!-- Controls -->
				<div class="left carousel-control">
					<a href="#carousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
				</div>
				<div class="right carousel-control">
					<a href="#carousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- event start -->


<script>
    $('.carousel[data-type="multi"] .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
    
        for (var i = 0; i < 2; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
    
            next.children(':first-child').clone().appendTo($(this));
        }
    }); 

    setInterval(function(){ 
        $(".slick-next").trigger('click');
    }, 5000);


    
</script>


@include('layouts.default.footer')