<?php
use App\View\Components\frontend\CetogoryMenu;
use App\View\Components\frontend\TopLink;
use App\View\Components\frontend\SlideShow;

?>

<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="{{asset('template/frontend/bootstrap/css/bootstrap.min.css')}}" media="screen">
    <link href="{{asset('template/frontend/themes/css/base.css')}}" rel="stylesheet" media="screen">
<!-- Bootstrap style responsive -->	
	<link href="{{asset('template/frontend/themes/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link href="{{asset('template/frontend/themes/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="{{asset('template/frontend/themes/js/google-code-prettify/prettify.css')}}" rel="stylesheet">
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="{{asset('template/frontend/themes/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('template/frontend/themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('template/frontend/themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('template/frontend/themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('template/frontend/themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject"></style>
	
  </head>
<body>
	 <div class="alert alert-danger" style="position: absolute; bottom: 0; right: 3%;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @if(session('message'))
        <div class="alert alert-success" style="position: absolute; bottom: 0; right: 3%;">
            {!! session('message') !!}
        </div>
@endif
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">

		
		<x-frontend.viewcart /> 

	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="/"><img src="{{asset('template/frontend/themes/images/logo.png')}}" alt="Bootsshop"></a>
		<form class="form-inline navbar-search" method="get" name="keywords_submit" action="/search">
		<input id="srchFld" class="srchTxt" type="text" name="keywords">
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <x-frontend.TopLink/>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<x-frontend.SlideShow/>

<div id="mainBody">
	<div class="container">
	<div class="row">
		
		
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
	<x-frontend.CategoryMenu/>
	<x-frontend.BrandMenu/>
</div>
<!-- Sidebar end=============================================== -->
		<div class="span9">		
		 
		@yield('noidung')
			  

		</div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
	<div id="footerSection">
	<div class="container">
		<div class="row">
			<x-frontend.bottom-link pos=3/>
			<x-frontend.bottom-link pos=4/>
			<x-frontend.bottom-link pos=5/>
			
			
			<div id="socialMedia" class="span3 pull-right">
				<h5>SOCIAL MEDIA </h5>
				<a href="#"><img width="60" height="60" src="{{asset('template/frontend/themes/images/facebook.png')}}" title="facebook" alt="facebook"></a>
				<a href="#"><img width="60" height="60" src="{{asset('template/frontend/themes/images/twitter.png')}}" title="twitter" alt="twitter"></a>
				<a href="#"><img width="60" height="60" src="{{asset('template/frontend/themes/images/youtube.png')}}" title="youtube" alt="youtube"></a>
			 </div> 
		 </div>
		<p class="pull-right">© Bootshop</p>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="{{asset('template/frontend/themes/js/jquery.js')}}" type="text/javascript"></script>
	<script src="{{asset('template/frontend/themes/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('template/frontend/themes/js/google-code-prettify/prettify.js')}}"></script>
	
	<script src="{{asset('template/frontend/themes/js/bootshop.js')}}"></script>
    <script src="{{asset('template/frontend/themes/js/jquery.lightbox-0.5.js')}}"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="{{asset('template/frontend/themes/switch/themeswitch.css')}}" type="text/css" media="screen">
<script src="{{asset('template/frontend/themes/switch/theamswitcher.js')}}" type="text/javascript" charset="utf-8"></script>
	
</div>
<span id="themesBtn"></span>

</body></html>





