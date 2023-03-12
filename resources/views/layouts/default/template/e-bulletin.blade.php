@include('layouts.default.header')

<style>
.team_section {
    margin-top: 85px;
    padding-top: 20px;
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
.ebulletin{
    border: 2px solid #2590c854;
    padding: 5px;    
}


.ebulletin h3 {
    color: #000;
}
</style>

<div class="wpo-mission-area team_section">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-lg-12 text-center what_we who_we">
                <h1>E-Bulletin</h1>
            </div>
        </div>
        
         <div class="row">
           @php
                $achivement = DB::table('con_e_bulletin')->where('status', 1)->orderBy('id', 'DESC')->get();
            @endphp
            @if ($achivement)
            @foreach ($achivement as $data)

            <div class="col col-md-4 col-lg-4">
            <a target="_blank" href="{{url('/')}}/uploads/images/pdf/{{$data->link}}">
                <div class="achivement_box ebulletin">
                    <img src="{{url('/')}}/uploads/images/pdf/{{$data->image}}" alt="">
                    <div class="achivement_text">
                        <h3>{{$data->title}}</h3>
                    </div>
                </div>
            </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>



@include('layouts.default.footer')