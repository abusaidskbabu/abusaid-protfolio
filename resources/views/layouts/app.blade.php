<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> {{ config('sximo')['cnf_appname'] }} </title>

<link rel="shortcut icon" href="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" type="image/x-icon">

<link href="{{ asset('sximo5/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/sximo.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/css/core.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/css/theme.css')}}" rel="stylesheet">

<link href="{{ asset('sximo5/js/plugins/toast/css/jquery.toast.css')}}" rel="stylesheet">
<!-- FONT -->
<link href="{{ asset('sximo5/fonts/icomoon.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/lineicons/LineIcons.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/fonts/awesome/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/iCheck/skins/flat/blue.css')}}" rel="stylesheet">
<link href="{{ asset('sximo5/js/plugins/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">



<script type="text/javascript" src="{{ asset('sximo5/sximo.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('sximo5/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('sximo5/js/plugins/tinymce/')}}/tinymce.min.js"></script>



<script type="text/javascript" src="{{ asset('sximo5/js/plugins/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo5/js/plugins/node-waves/waves.js') }}"></script>
<script type="text/javascript" src="{{ asset('sximo5/js/sximo.js') }}"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->         


</head>
<body >
<div id="preloader"></div>
  <div id="app" class="page-wrapper">
        @include('layouts.navigation') 
        <main class="page-content" > 
        <a href="javascript:;" class="toggleMenu flying-button"  ><i class="lni-menu"></i></a>      
            <div class="page-inner">
            <div class="ajaxLoading"></div>   
            @yield('content')
            </div>  
        </main>
        
  </div>



<div class="modal " id="sximo-modal" role="dialog" aria-hidden="true" tabindex="-1"  >
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"  id="sximo-modal-content">
           
          </div>
          
        </div>
    </div>
</div>
<script type="text/javascript">


  $(document).ready(function(){


   
  })
</script>
{{ SiteHelpers::showNotification() }} 
</body>
</html>
