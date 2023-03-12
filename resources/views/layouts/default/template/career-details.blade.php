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
                <h2>{{$title}}</h2>
            </div>
        </div>
    </div>
</div>





<div class="container">

    <div class="row mb-4">
        <img src="{{ asset('uploads') }}/images/companylogo/{{ $history_details->company_logo }}" height="200">
        <h4 class="feature-title">{{ $history_details->duration }} ({{ $history_details->position }})</h4>
        <div class="feature-content" ><p style="">{{ $history_details->company_name }}</p></div>
        <div>
        	{{  $history_details->description }}
        </div>
    </div>
       
</div>


@include('layouts.default.footer')