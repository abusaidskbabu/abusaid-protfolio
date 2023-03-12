@include('layouts.default.header')

<style>
.ti-facebook:hover {
    background: none !important;
    color: #003fd6 !important;
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

<div class="pddig_botm" id="team_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    {{-- <span>Meet Our Team</span> --}}
                    <h2>Governing Body</h2>
                </div>
            </div>
        </div>
        <div class="row team_span">
            @php
            $team = DB::table('con_team')->where('status', 1)->where('category', 1)->orderBy('sort_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/team/{{$data->image}}" alt="">
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





<div class="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wpo-section-title">
                    {{-- <span>Meet Our Team</span> --}}
                    <h2>Team Member</h2>
                </div>
            </div>
        </div>
        <div class="row team_span">
            @php
            $team = DB::table('con_team')->where('status', 1)->where('category', 2)->orderBy('sort_number', 'ASC')->get();
            @endphp
            @if ($team)
            @foreach ($team as $data)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="wpo-team-wrap mygobernig_body">
                    <div class="wpo-team-img">
                        <img src="{{ asset('uploads') }}/images/team/{{$data->image}}" alt="">
                    </div>
                    <div class="wpo-team-content">
                        <div class="wpo-team-text-sub">
                            <h2>{{$data->name}}</h2>
                            <span>{{$data->position}}</span>
                            <ul>
                                @if($data->facebook)
                                    <li><a href="{{$data->facebook}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($data->twitter)
                                    <li><a href="{{$data->twitter}}"><i class="ti-twitter"></i></a></li>
                                @endif
                                @if($data->linkedin)
                                    <li><a href="{{$data->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                @endif
                                @if($data->email)
                                    <li><a href="{{$data->email}}"><i class="ti-email"></i></a></li>
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













<script>
$(document).on('click', '.btn_site', function(){
    var id = $(this).attr('data-id');
    $.ajax({
           type:'POST',
           url:'{{url("user-details")}}',
           data:{_token: "{{ csrf_token() }}", id:id},
           success:function(response){
              $('.modal_content').html(response);
             $(this).parent('.wpo-team-content').find('.wpo-team-text-sub').css({"margin-bottom":"0"});
           }
        });
});
</script>
@include('layouts.default.footer')