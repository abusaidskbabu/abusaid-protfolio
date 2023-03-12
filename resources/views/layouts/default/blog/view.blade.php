<style>
.blog_hidden{
    height:85px;
}
.big_part_blog p{
    padding-top:15px;
}
.blog_single_page{
    margin-top:115px;
}
</style>
<section id="blog" class="section blog_single_page">
      <!-- Container Starts -->
      <div class="container">         
        <!-- Row Starts -->
        <div class="row">  
            <div class="col-md-8 big_part_blog">
                 <h2> {{ $title }}</h2>
                <div class="" style="margin: 0px 0 20px;">   
                <div class="section-tool text-left ">
                    <i class="fa fa-eye "></i>  <span>  Views (<b> {{ $posts->views }} </b>)  </span>   
                    <i class="fa fa-user "></i>  <span>  {{ ucwords($posts->username) }}  </span>   
                    <i class="icon-calendar3"></i>  <span> {{ date("M j, Y " , strtotime($posts->created)) }} </span> 
                    <!--<i class="fa fa-comment-o "></i>   <span>  {{ $posts->comments }} comment(s)  </span> -->
                </div>

                <div>
                  @if(file_exists('./uploads/images/'.$posts->image) && $posts->image !='' )
                  <img src="{{ asset('uploads/images/'.$posts->image) }}" alt="" class="img-fluid img-responsive">
                  @endif
                </div>                                  
                  {!! PostHelpers::formatContent($posts->note) !!}  
                </div>  
            </div>
            <div class="col-md-4">
                     @include('layouts.default.blog.widget')
                </div>
     
         </div> 
          

        </div><!-- Row Ends -->

      </div><!-- Container Ends -->
    </section>

    <script type="text/javascript">
        $(function(){
            $('.remove').on('click',function(){
                if(confirm('Remove comment ?'))
                {
                    return true;
                }
                return false;
            })
        })
    </script>