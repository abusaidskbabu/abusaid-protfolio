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
                    <h2>{{$title}}</h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>{{$title}}</span></li>
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
                $publications = DB::table('con_publications')->where('status', 1)->orderBy('id', 'DESC')->get();
            @endphp
            <div class="row">
                @foreach($publications as $data)
                    <div class="col-md-4 col-lg-4 @if($loop->iteration == 1) active @endif">
                        <div class="">
                            <div class="block img-responsive">
                              <img  class="" src="{{ asset('uploads') }}/images/publication/{{ $data->image }}" height="200" alt="">
                            </div>
                            <div class="partner_name pb-2" style="width: 92.5%;">
                                <p class="text-capitalize m-0"><b>{{  Str::limit($data->title, $limit = 30, $end = '..') }}</b></p>
                                <a  target="_blank" href="{{ $data->link }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('layouts.default.footer')