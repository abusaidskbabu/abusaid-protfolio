<style>
.widget_space{
padding-bottom:10px;
}    
.w-lists h3 {
    font-weight: 400 !important;
    line-height: 22px !important;
}
</style>
            @php
                $url = url()->current();
                $url = explode('/', $url);
                $alias = $url[5];
                $posts = DB::table('tb_pages')->where('alias', $alias)->where('cid', 2)->where('status', 'enable')->orderBy('pageID', 'DESC')->paginate(10);
            @endphp
            
            
            @if(count($posts) > 0)
            <div class="widget">
                <div class="widget-title">
                    <h2 class="title">Latest News</h2>
                </div>
                <div class="w-lists">
                  @foreach($posts as $pop)
                    <div class="row mb-4 widget_space">
                        <div class="col-md-3 image-thumb">
                          <a href="{{ url('posts/read/'.$pop->alias) }}">
                             <img src="{{ asset('uploads/images/'.$pop->image) }}" alt=""  >
                            </a>
                        </div>
                        <div class="col-md-8">
                           <a href="{{ url('posts/read/'.$pop->alias) }}">
                            <h3>{{ Str::limit(strip_tags($pop->title), $limit =50, $end = '..') }} </h3>
                           </a>      
                             <div class="info ">
                                <i class="fa fa-eye "></i>  <span>  Views (<b> {{ $pop->views }} </b>)  </span>   
                                <i class="icon-calendar3"></i>  <span> {{ date("M j, Y " , strtotime($pop->created)) }} </span> 
                                <!--<i class="fa fa-comment-o "></i>   <span>  0 comment(s)  </span> -->
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>  
            
            
            
            
            @else
            <div class="widget">
                <div class="widget-title">
                    <h2 class="title"> Other Events</h2>
                </div>
                <div class="w-lists">
                  @foreach($popular as $pop)
                    <div class="row mb-4 widget_space">
                        <div class="col-md-3 image-thumb">
                          <a href="{{ url('posts/read/'.$pop->alias) }}">
                             <img src="{{ $pop->image }}" alt=""  >
                            </a>
                        </div>
                        <div class="col-md-8">
                           <a href="{{ url('posts/read/'.$pop->alias) }}">
                            <h3>{{ Str::limit(strip_tags($pop->title), $limit = 50, $end = '..') }} </h3>
                           </a>      
                             <div class="info ">
                                <i class="fa fa-eye "></i>  <span>  Views (<b> {{ $pop->views }} </b>)  </span>   
                                
                                <i class="icon-calendar3"></i>  <span> {{ date("M j, Y " , strtotime($pop->created)) }} </span> 
                                <!--<i class="fa fa-comment-o "></i>   <span>  0 comment(s)  </span> -->
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>    
            @endif
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
             



{{--             <div class="widget">
                <div class="widget-title">
                    <h4 class="title"> Categories </h4>
                </div>

                <ul class="w-list-categories">
                  @foreach($categories as $category)
                  <li class="">
                    <a href="{{ url('posts/category/'.$category->alias ) }}"> {{ $category->name }} ( {{ $category->total }} ) </a>
                  </li>
                  @endforeach
                </ul> 
            </div>

            <div class="widget">
                <div class="widget-title">
                    <h4 class="title"> Tags / Labels </h4>
                </div>

            </div> --}}



           </div>
