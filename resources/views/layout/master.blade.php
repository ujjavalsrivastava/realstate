<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>@yield('title');</title>

<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/css/style-color-yellow.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="images/favicon-yellow.png" type="image/x-icon">
<link rel="icon" href="images/favicon-yellow.png" type="image/x-icon">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
@yield('style')
</head>
<body>
<div class="page-wrapper">

<!-- <div class="preloader"></div> -->

@include('comman.header')

@yield('content');

@include('comman.footer')
</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">

</script><script src="{{ URL::asset('assets/js/jquery.js')}}"></script>
<script src="{{ URL::asset('assets/js/popper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.fancybox.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery-ui.js')}}"></script>
<script src="{{ URL::asset('assets/js/wow.js')}}"></script>
<script src="{{ URL::asset('assets/js/appear.js')}}"></script>
<script src="{{ URL::asset('assets/js/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/swiper.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/owl.js')}}"></script>
<script src="{{ URL::asset('assets/js/script.js')}}"></script>
@yield('script');
</body>

</html>