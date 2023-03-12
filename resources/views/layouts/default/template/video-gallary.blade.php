@include('layouts.default.header')
<style>
    .photo_custom_slider, .photo_custom_slider .slide{
        height:50vh !important;
    }
@media (min-width: 992px){
.modal-lg {
    width: 650px !important;
}
}
.thumbnail {
    height: 400px;
}

@media (max-width: 991px){
.thumbnail {
    height: unset  !important;
}

}
</style>


<div style="margin-top: 120px;" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wpo-section-title">
                <h2>{{$title}}</h2>
            </div>
        </div>
    </div>
</div>





<div class="container">

    <div class="row mb-4">
        @php
            $video = DB::table('con_videos')->where('status', 1)->orderBy('id', 'DESC')->get();
        @endphp
        @if ($video)
        @foreach ($video as $data)
        <div class="col-lg-3 col-md-3 mb-4">
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
                    <h4>{{  Str::limit($data->title, $limit = 20, $end = '..') }}</h4>
                    <p>{{  Str::limit($data->description, $limit = 80, $end = '..') }}</p>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
       
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wpo-section-title">
                <a target="_blank" href="https://www.flickr.com/shasthoshurokkha"><button class="animated_button"><span>More Photos </span></button></a>
                
            </div>
        </div>
    </div>
</div> --}}


@include('layouts.default.footer')