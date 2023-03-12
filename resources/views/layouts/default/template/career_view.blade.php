@include('layouts.default.header')
<style>
.career_form_bg{
    padding-top:50px;
    padding-bottom: 50px; 
}

.form-control {
    height: 45px;
    margin-bottom: 12px;
}
.scpl_btn{
    padding: 8px 15px 8px 15px;
    background: #102445;
    color: #fff;
}
.career_form_bg{
    padding-top: 100px !important;
}
</style>


<section class="career_form_bg">
        <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h3 style="color:#000;font-weight:800;">JOB DESCRIPTION</h3>
                <section>
                    <div class="career_description">
                        <p class="date_item">Post Date: {{ date('d M, Y', strtotime($career->post_date)) }}</p>
                         <p class="date_item red-text">Application Deadline: {{ date('d M, Y', strtotime($career->post_end_date)) }}</p> 
                        {!! $career->description !!}
                    </div>
                </section>
            </div>
            <div class="col-md-6">
        		<div class="no-padding container_form">
        		    <h3 style="color:#000; font-weight:800;">APPLY FOR THIS JOB</h3>
                    <h5 class="car_title">Fill up the following things</h5>
            		    <form id="career" method="post" action="/savecareer" enctype='multipart/form-data' >
            		        @csrf
            				<input class="form-control" type="text" id="fname" name="firstname" placeholder="First Name">
            				<input class="form-control" type="text" id="lname" name="lastname" placeholder="Last name">
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                            <input class="form-control" type="phone" id="phone" name="phone" placeholder="Phone number">
                            <p class="resume">Upload your resume</p>
                            <input class="form-control" type="file" id="cv" name="cv" >
                            <input type="hidden" name="job_post" value="{{$career->id}}" >
                            <input type="hidden" name="job_title" value="{{$career->title}}" >
            				<textarea class="form-control" id="cover_letter" name="cover_letter" placeholder="Write cover letter" style="height:200px"></textarea>
            				<button class="scpl_btn" value="submit" type="submit">Apply Now</button>
                       </form>
                    <p class="respone"></p>
                </div>
            </div>
        </div>
    </div>
</section>

@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
         <script>setTimeout(function(){ jQuery('.alert-success').remove(); }, 5000);</script>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
             <script>setTimeout(function(){ jQuery('.alert-danger').remove(); }, 5000);</script>
    </div>
@endif
<script>
    jQuery(document).on('click','.scpl_btn',function(event){
       jQuery(this).unbind(event);
       jQuery("form#career :input").each(function(){
         var input = $(this);
            if( !input.val() ) {
                event.preventDefault();
                jQuery('.respone').html('<p style="color:red;margin-top: 10px;">*All fields are required!</p>');
            }
        });
    });
</script>


@include('layouts.default.footer')

