@include('layouts.default.header')
<!--<section class="hidden_section newspage"></div>-->
<style>
.single_box {
    height: 100px !important;
}    
</style>
<div class="wpo-breadcumb-area what_we_do">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-lg-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>About Myself</h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>About Myself</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  

<style>
.wpo-mission-icon, .wpo-mission-icon-1, .wpo-mission-icon-2, .wpo-mission-icon-3, .wpo-mission-icon-4, .wpo-mission-content h2{
	text-align: center;
}
#header {
    border-bottom:none !important;
}

.achimved_img{
padding-bottom: 25px;

}
.achiv_btn{
cursor:pointer;    
}
.achimved_img img{
    width: 100%;
    height: auto;

}
@media (max-width: 767px){
.section_p_b, .wpo-mission-area {
    padding-bottom: 0px !important;
}
}
.partner_name{
    padding:5px !important;
}
</style>

<div class="container">
    <div class="row section_p_b section_p_t">
        <div class="col col-md-12 col-lg-12 text-center what_we who_we">
            @php
                $about = DB::table('con_about_me')->orderBy('id', 'DESC')->first();
            @endphp
            {!! $about->descriptions !!}
        </div>
    </div>
</div>

@include('layouts.default.footer')