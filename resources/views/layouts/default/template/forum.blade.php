@include('layouts.default.header')

<style>
.ti-facebook:hover {
    background: none !important;
    color: #003fd6 !important;
}   
.team_section {
    margin-top: 85px;
    padding-top: 20px;
}
.wpo-team-img img {
    width: 100% !important;
    height: 290px !important;
    object-fit: cover important;
}


</style>
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
            <div class="popup_doal modal_content" >

            </div>
        </div>
      </div>
    </div>
  </div>
<!--modal end-->




<div class="pddig_botm team_section">
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <h2>Bangladesh Parliamentary Forum for Health and Well being</h2>
                </div>
            </div>
        </div>    
        
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <p>
                        The Parliamentary Forum for Health and Wellbeing in Bangladesh aims to promote learning and exchange of knowledge among the parliamentarians to better engage them with health and wellbeing related issues i.e. prevention and control of, Non-Communicable diseases, Communicable diseases such as COVID-19, and health system changes for Universal Health Coverage etc.  This group will raise the profile of the health and wellbeing situation of Bangladesh nationally, regionally, and globally in different parliamentarian forum and to contribute to accelerate the progress towards ensuring the rights to health for all.
                    </p>
                </div>
                <div class="text-center pt-3 pb-3">
                    <p>
                        Shastho Shurokkha Foundation is providing secretariat support to the Bangladesh Parliamentary Forum for Health and Well being.
                    </p>
                </div>
            </div>
        </div>   
        
        
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h3>Advisors</h3>
                </div>
            </div>
        </div>
        <div class="row team_span">
            @php
            $team = DB::table('con_forum')->where('status', 1)->where('category', advisors)->orderBy('short_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/forum/{{$data->image}}" alt="">
                    </div>
                    <div class="wpo-team-content">
                        <div class="wpo-team-text-sub">
                            <h2>{{$data->name}}</h2>
                            <span>{{$data->position}}</span>
                            <ul>
                                @if($data->facebook)
                                    <li><a target="_blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($data->twitter)
                                    <li><a target="_blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if($data->linkedin)
                                    <li><a target="_blank" href="{{$data->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif
                                @if($data->email)
                                    <li><a href="mailto:{{$data->email}}"><i class="ti-email"></i></a></li>
                                @endif
                            </ul>
                            <button data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn_site">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- wpo-team-area end -->

<div class="pddig_botm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h3>Chairman</h3>
                </div>
            </div>
        </div>
        <div class="row team_span middle_section">
            <div class="col-lg-4 col-md-4"></div>
            @php
            $team = DB::table('con_forum')->where('status', 1)->where('category', chairman)->orderBy('short_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-4 col-md-4 col-sm-6 col">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/forum/{{$data->image}}" alt="">
                    </div>
                    <div class="wpo-team-content">
                        <div class="wpo-team-text-sub">
                            <h2>{{$data->name}}</h2>
                            <span>{{$data->position}}</span>
                            <ul>
                                @if($data->facebook)
                                    <li><a target="_blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($data->twitter)
                                    <li><a target="_blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if($data->linkedin)
                                    <li><a target="_blank" href="{{$data->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif
                                @if($data->email)
                                    <li><a href="mailto:{{$data->email}}"><i class="ti-email"></i></a></li>
                                @endif
                            </ul>
                            <button data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn_site">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <div class="col-lg-4 col-md-4"></div>
        </div>
    </div>
</div>
<!-- wpo-team-area end -->
<div class="pddig_botm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h3>Co-Chairmen</h3>
                </div>
            </div>
        </div>
        <div class="row team_span">
            @php
            $team = DB::table('con_forum')->where('status', 1)->where('category', co_chairmen)->orderBy('short_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/forum/{{$data->image}}" alt="">
                    </div>
                    <div class="wpo-team-content">
                        <div class="wpo-team-text-sub">
                            <h2>{{$data->name}}</h2>
                            <span>{{$data->position}}</span>
                            <ul>
                                @if($data->facebook)
                                    <li><a target="_blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($data->twitter)
                                    <li><a target="_blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if($data->linkedin)
                                    <li><a target="_blank" href="{{$data->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif
                                @if($data->email)
                                    <li><a href="mailto:{{$data->email}}"><i class="ti-email"></i></a></li>
                                @endif
                            </ul>
                            <button data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn_site">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- wpo-team-area end -->



<div class="pddig_botm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    <h3>Members</h3>
                </div>
            </div>
        </div>
        <div class="row team_span">
            @php
            $team = DB::table('con_forum')->where('status', 1)->where('category', members)->orderBy('short_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/forum/{{$data->image}}" alt="">
                    </div>
                    <div class="wpo-team-content">
                        <div class="wpo-team-text-sub">
                            <h2>{{$data->name}}</h2>
                            <span>{{$data->position}}</span>
                            <ul>
                                @if($data->facebook)
                                    <li><a target="_blank" href="{{$data->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($data->twitter)
                                    <li><a target="_blank" href="{{$data->twitter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if($data->linkedin)
                                    <li><a target="_blank" href="{{$data->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif
                                @if($data->email)
                                    <li><a href="mailto:{{$data->email}}"><i class="ti-email"></i></a></li>
                                @endif
                            </ul>
                            <button data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn_site">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- wpo-team-area end -->


<script>
$(document).on('click', '.btn_site', function(){
    var id = $(this).attr('data-id');
    $.ajax({
           type:'POST',
           url:'{{url("forum-for-health-modal")}}',
           data:{_token: "{{ csrf_token() }}", id:id},
           success:function(response){
              $('.modal_content').html(response);
             $(this).parent('.wpo-team-content').find('.wpo-team-text-sub').css({"margin-bottom":"0"});
           }
        });
});
</script>
@include('layouts.default.footer')