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
        <div class="panel-group" id="accordion">
            @php 
                $research = DB::table('con_research_and_publication')->where('status', 1)->orderBy('id', 'DESC')->get();
            @endphp
            @foreach($research as $data)
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #0d2148;">
                        <h4 class="panel-title" style="color: white;">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $data->id }}">{{ $data->title }}</a>
                        </h4>
                    </div>
                    <div id="collapse{{ $data->id }}" class="panel-collapse collapse @if($loop->iteration == 1) in @endif">
                        <div class="panel-body">
                            @if(!empty($data->image))
                            <div class="image text-center">
                                <img src="{{ asset('uploads') }}/images/publication/{{ $data->image }}" height="200">
                            </div>
                            <br>
                            @endif
                            {{ $data->description }}
                            <br>
                            <br>
                            
                            @if(!empty($data->file))
                            <embed src="{{ asset('uploads') }}/images/publication/{{ $data->file }}" type="application/pdf" width="100%" height="600px" />
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
</div>

@include('layouts.default.footer')