@include('layouts.default.header')
<style>
    .photo_custom_slider, .photo_custom_slider .slide{
        height:50vh !important;
    }
@media (min-width: 992px){
.modal-lg {
    width: 650px !important;
}
}
.thumbnail {
    height: 400px;
}

@media (max-width: 991px){
.thumbnail {
    height: unset  !important;
}

}
</style>


<div style="margin-top: 120px;" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wpo-section-title">
                <h2>Photo Gallery</h2>
            </div>
        </div>
    </div>
</div>





<div class="container">

    <div class="row mb-4">

      @php
      $photo = DB::table('our_gallary')->where('status', 1)->orderBy('id', 'DESC')->limit(12)->get();
          @endphp
          @if ($photo)
          @foreach ($photo as $data)
          <div class="col-md-3 mb-4">
            <div class="">
              <div class="block img-responsive">
                <a href="" data-toggle="modal" data-target="#myModal1">
                  <img  class="block_image_big" src="{{ asset('uploads') }}/images/gallery/{{ $data->image }}" alt="">
                </a>
                
              </div>
            </div>
          </div>
          
        @endforeach
        @endif
        <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container" style="width:100%; padding:0px;">
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                        @foreach($photo as $data)
                          <div class="item @if($loop->iteration == 1) active @endif " style="width:100%">
                            <img src="{{ asset('uploads') }}/images/gallery/{{ $data->image }}" width="100%">
                          </div>
                        @endforeach
                        </div>
                    
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                 </div>
                </div>
              </div>
              
            </div>
    </div>
       
</div>

{{-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wpo-section-title">
                <a target="_blank" href="https://www.flickr.com/shasthoshurokkha"><button class="animated_button"><span>More Photos </span></button></a>
                
            </div>
        </div>
    </div>
</div> --}}


@include('layouts.default.footer')