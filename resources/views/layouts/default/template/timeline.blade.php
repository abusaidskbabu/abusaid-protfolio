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
                    <h2>{{ $title }}</h2>
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><span>{{ $title }}</span></li>
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
    <div class="wpo-about-video-area section-padding" >
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wpo-section-title">
                        <h2 class="text-light" >CAREER</h2>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                @foreach(DB::table('con_career_history')->where('status', 1)->orderBy('id', 'DESC')->get() as $row)
                <div class="row mb-2" style="background-color: #1e396e; padding: 30px 30px 30px 30px;border-radius: 13px;">
                  <div class="col-md-3 col-sm-12">
                    <img src="{{ asset('uploads') }}/images/companylogo/{{ $row->company_logo }}" class="card-img-top" />
                  </div>
                  <div class="col-md-9 col-sm-12">
                    <h4 class="feature-title">{{ $row->duration }} ({{ $row->position }})</h4>
                    <div class="feature-content" ><p style="color: white;">{{ $row->company_name }}</p></div>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                       <div id="tracking-pre"></div>
                       <div id="tracking">
                          <div class="tracking-list">
                            @foreach(DB::table('con_career_history')->where('status', 1)->orderBy('id', 'DESC')->get() as $row)
                              <div class="tracking-item">
                                <div class="tracking-icon status-intransit">
                                </div>
                                <div class="tracking-date">
                                  <h6 style="font-size: 18px;">{{ $row->duration }}</h6>
                                  <span class="text-capitalizet" style="color: black;">{{ $row->company_name }}</span>
                                </div>
                                <div class="tracking-content">
                                  <h4 class="title" style="color: black;">{{ $row->position }}</h4>
                                  <span style="color: black;">{{  Str::limit($row->description, $limit = 210, $end = '') }}</span>
                                  <a href="{{ route('career.details', $row->id) }}">Read More</a>
                                </div>
                              </div>
                             @endforeach
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.default.footer')