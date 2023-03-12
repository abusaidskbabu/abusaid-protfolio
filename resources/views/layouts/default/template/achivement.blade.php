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
<div class="wpo-mission-area team_section">
    <div class="container">
        <div class="row">
            <div class="col col-md-12 col-lg-12 text-center what_we who_we">
                <h1>Our Achivement</h1>
            </div>
        </div>
        
         <div class="row">
            @php
                $achivement = DB::table('con_achivement')->where('status', 1)->orderBy('id', 'DESC')->get();
            @endphp
            @if ($achivement)
            @foreach ($achivement as $data)
            <div class="col col-md-4 col-lg-4 achiv_btn" data-id="{{$data->id}}" data-toggle="modal" data-target="#exampleModal">
                <div class="achivement_box zigzag">
                    <img src="{{url('/')}}/uploads/images/achivement/{{ $data->image }}" alt="">
                    <div class="achivement_text">
                        <h3>{{ $data->title }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

<script>
$(document).on('click', '.achiv_btn', function(){
    $('.achimved_img img').css({'opacity':'0.1'});
    var id = $(this).attr('data-id');
    $.ajax({
           type:'POST',
           url:'{{url("achivement-details")}}',
           data:{_token: "{{ csrf_token() }}", id:id},
           success:function(response){
               $('.achimved_img img').css({'opacity':'1'});
              $('.modal_content').html(response);
             $(this).parent('.wpo-team-content').find('.wpo-team-text-sub').css({"margin-bottom":"0"});
           }
        });
});
</script>

@include('layouts.default.footer')