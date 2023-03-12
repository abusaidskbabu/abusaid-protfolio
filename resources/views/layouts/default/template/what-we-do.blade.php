@include('layouts.default.header')
<!--<section class="hidden_section newspage"></div>-->
<style>
.wpo-mission-icon, .wpo-mission-icon-1, .wpo-mission-icon-2, .wpo-mission-icon-3, .wpo-mission-icon-4, .wpo-mission-content h2{
	text-align: center;
}
ol, ul{
    padding-left: 15px;
}
.square_icon i{
font-size: 30px;
margin-bottom: 10px;
margin-top: 10px;    
}
.higher_text{
padding: 30px 20px 45px 20px;
}
</style>




<div class="wpo-breadcumb-area what_we_do">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>Our Activities</h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>Our Activities</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  



<section class="hero hero-style-1 my_custom_slider what_page" id="mission_vision">
    <div class="hero-slider">

        <div class="slide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 colsm-12">
                        <div class="wpo-about-text">
                            <div class="wpo-section-title">
                                <!--<span>What is our mission?</span>-->
                                <h2>Our Mission</h2>
                            </div>
                            <p>To empower communities and individuals with good health, poverty alleviation, literacy, and social justice. Our aim is to achieve large scale positive changes in health, education, social development and well being.</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 colsm-12">
                        <div class="wpo-about-img">
                            <img src="{{ asset('uploads') }}/images/16.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slide">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 colsm-12">
                        <div class="wpo-about-img">
                            <img src="{{ asset('uploads') }}/images/17.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 colsm-12">
                        <div class="wpo-about-text">
                            <div class="wpo-section-title">
                                <!--<span>What is our vission?</span>-->
                                <h2>Our Vision</h2>
                            </div>
                            <p>We seek a world of hope, free from poverty & discrimination where people are empowered with dignity, good health and security.</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="wpo-mission-area section_p_b">

    <div class="container">
        <div class="row section_p_t">
            <div class="col-12 text-center what_we">
                    <h1>Our Projects</h1>
                   <p>We educate and raise awareness on healthy lifestyle and practices at home and public places emphasizing on reproductive and sexual health, nutrition, personal health, hygiene and mental health. We also work extensively on Universal Health Coverage and SDGs which include maternal and child mortality, adolescent health and health system strengthening. We also raise community awareness on environmental sustainability such as tree plantation and humanitarian response. We address key issues such as drug abuse, early marriage, violence against women, health and safety for all.</p>
            </div>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
               @php
                    $partner = DB::table('con_our_activities')->where('status', 1)->orderBy('id', 'DESC')->get();
                @endphp
                @if ($partner)
                @foreach ($partner as $data)
                <div class="modal_content" id="moadal{{$data->id}}">
                    <h2>{{$data->title}}</h2>
                    <p>{!! $data->description !!}</p>
                </div>
                @endforeach
                @endif
        </div>
      </div>
    </div>
  </div>
<!--modal end-->
        <div class="wpo-mission-wrap">
            <div class="row">
                @php
                    $activities = DB::table('con_our_activities')->where('status', 1)->orderBy('id', 'DESC')->get();
                @endphp
                
                
                
                @if ($activities)
                @if($activities->count() == 3)
                <div class="col-md-3 col-sm-3 col-12"></div>
                @endif
                @if($activities->count() == 4)
                <div class="col-md-2 col-sm-2 col-12"></div>
                @endif                
                
                @foreach ($activities as $data)
                @php
                    $text = strlen($data->title);
                @endphp
                @if($text > 15)
                <div class="col-md-2 col-sm-6 col-12 custom-grid" onclick="funcOne({{$data->id}})">
                    <span data-toggle="modal" data-target="#exampleModal">
                    <div class="wpo-mission-item  what_we_do_left icon_design higher_text">
                        <div class="wpo-mission-icon-3 square_icon">
                            {!! $data->icon !!}
                        </div>
                        <div class="wpo-mission-content">
                            <h2>{{ Str::limit($data->title, $limit = 20, $end = '..')}}</h2>
                        </div>
                    </div>
                    </span>
                </div>
                @else
                <div class="col-md-2 col-sm-6 col-12 custom-grid" onclick="funcOne({{$data->id}})">
                    <span data-toggle="modal" data-target="#exampleModal">
                    <div class="wpo-mission-item  what_we_do_left icon_design">
                        <div class="wpo-mission-icon-3 square_icon">
                            {!! $data->icon !!}
                        </div>
                        <div class="wpo-mission-content">
                            <h2>{{ Str::limit($data->title, $limit = 15, $end = '..')}}</h2>
                        </div>
                    </div>
                    </span>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>



<script>
@php $banners = DB::table('con_banner_slider')->where('status',1)->where('type','what_we_do')->get();@endphp
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




<script>
setInterval(function(){ 
    $(".slick-next").trigger('click');
}, 5000);
    
    
function funcOne(response){
    $('.modal_content').hide();
    var id ='moadal'+response;
    document.getElementById(id).style.display = "block";
}
</script>
@include('layouts.default.footer')