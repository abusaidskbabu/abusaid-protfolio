@include('layouts.default.header')
<style>
.job_item{
    padding-top: 20px;
    padding-bottom: 10px;
    margin-top: 20px;
    background: #b7babf8a;
}    
.job_item:hover{
    background: #2590c8;
}
.job_item:hover .serial_text{
   border:1px solid #fff;
}

.job_item:hover .apply_button{
   border:1px solid #fff;
}



.serial_text, .apply_button{
    color:#fff;
}

#full_career{
    padding-top: 30px;
    padding-bottom: 50px;    
}
.date_item, .post_title{
    color:#000;
}
.job_item:hover .date_item{
   color:#fff;
}
.job_item:hover .post_title{
   color:#fff;
}

.serial_text{
    padding: 20px 25px 20px 25px;
    background: #2590c8;
}
.apply_button{
    padding: 10px 0px 10px 15px;
    background: #2590c8;
    text-transform: uppercase;
    transition-duration: 1s;
}
.apply_button:hover{
    color:#fff;
    padding: 10px 15px 10px 15px;
}
.mychev{
    margin-left:10px;
}

.apply_button i{
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s 0.5s, opacity 0.5s linear;
}

.apply_button:hover i{
  visibility: visible;
  opacity: 1;
  transition: opacity 0.5s linear;
}
.mytext{
    margin-top:15px;
}
#full_career{
    padding-top: 100px !important;
    min-height:90vh;
}

</style>



<!--<section class="no-padding">-->
<!--    <div class="background_image" style="background-image:url('/uploads/images/career.jpg')">-->
<!--        <div class="overlay"></div>-->
<!--       <div class="full-screen position-relative">-->
<!--          <div class="slider-typography text-center">-->
<!--            <div class="banner_center banner_center_career">-->
<!--                <h2 class="total_big"><span class="first_big">J</span>oin <span class="first_big">VMSL</span> <span class="first_big">F</span>amily</h2>-->
<!--                <div class="car_quote"><p>VMSL works toward the digitalization of the future. As entrepreneurs, we offer services with innovation and deliver end-to-end solutions for our clients.-->
<!--To transform the businesses in ways the industry has never seen before, VMSL provides innovation and digitalization with Hi-technology. We believe the reason behind every success is our team's strength and proficiency. We are committed to the establishment of a sophisticated, inclusive atmosphere, where everyone is valued and appreciated, no matter who they are. We know that knowledge is continual, hence we are devoted to take part in advancing the future of our our purpose and values. You can learn more about <a class="no_style_a" href="/our-purpose">our purpose and values.</a></p></div>-->

<!--            </div>-->
            
<!--             <div class="scroll-bottom scroll-bottom-home" >-->
<!--                <img src="{{ asset('frontend/default/images/down-arrow.png')}}" >-->
<!--             </div>-->
<!--          </div>-->
<!--       </div>-->
<!--    </div>-->
<!--</section>-->


<section id="full_career">
    <div class="container">
    @foreach($circular as $key => $c)
      <div class="job_item">
        <div class="row">
                <div class="col-md-2">
                    <p class="text-center mytext"><span class="serial_text">{{$key+1}}</span></p>
                </div>
                <div class="col-md-8">
                    <p class="date_item">Post Date: {{ date('d M, Y', strtotime($c->post_date)) }}</p>
                     <p class="post_title text-uppercase">{{strtoupper($c->title)}}</p>
                    <!-- <p class="date_item red-text">Deadline: {{ date('d M, Y', strtotime($c->post_end_date)) }}</p> -->
                </div>
                <div class="col-md-2">
                    <div class="mytext">
                        <a class="apply_button button" href="{{ route('circular', $c->id) }}"><span>apply now  <i class="fa fa-angle-double-right mychev" aria-hidden="true"></i></span></a>
                    </div>
                </div>
            </div>
       </div>
      @endforeach

    </div>

</section> 
  

	  


@include('layouts.default.footer')