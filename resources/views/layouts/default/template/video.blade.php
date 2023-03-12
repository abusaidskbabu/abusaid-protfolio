@include('layouts.default.header')
<!--<section class="hidden_section newspage"></div>-->
<!-- video start -->
<style>
.video_page .wpo-about-video-item {
    margin-bottom: 50px;
    height: 320px !important;
    overflow: hidden;
}   
</style>

<div class="wpo-about-video-area video_page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h2>Watch Our Latest Videos</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @php
                $video = DB::table('con_videos')->where('status', 1)->orderBy('id', 'DESC')->limit(8)->get();
            @endphp
            @if ($video)
            @foreach ($video as $data)
            <div class="col-lg-3 col-md-3">
                <div class="wpo-about-video-item">
                    <div class="wpo-about-video-img">
                        <img src="{{ asset('uploads') }}/images/videos/{{$data->image}}" alt="">
                        <div class="entry-media video-holder">
                            @php 
                                $video_id = explode('v=',$data->youtube_link); 
                                if(count($video_id) > 1){
                                    $video_id = $video_id[1];
                                    $video_id = explode('&',$video_id)[0];
                                }
                            @endphp
                            @if($video_id)
                                <div class="entry-media video-holder">
                                    <a href="{{ 'https://www.youtube.com/embed/'.$video_id }}" class="video-btn" data-type="iframe">
                                        <i class=""></i>
                                    </a>
                                </div>
                              @endif
                        </div>
                    </div>
                    <div class="video_text">
                        <h4>{{  Str::limit($data->title, $limit = 25, $end = '..') }}</h4>
                        <p>{{  Str::limit($data->description, $limit = 60, $end = '') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</div>
<!-- video end -->



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wpo-section-title">
                <a target="_blank" href="https://www.youtube.com/channel/UC7mX25rynqcaNLLX9B-y0TA"><button class="animated_button"><span>More Videos </span></button></a>
            </div>
        </div>
    </div>
</div>
@include('layouts.default.footer')