<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Title of The Page -->
        <title>{{ $title }} | {{ config('sximo')['cnf_appname'] }}</title>
        <!-- Meta Informations -->
        <meta charset="utf-8">
        <meta name="description" content="{{ config('sximo')['cnf_metadesc'] }}">
        <meta name="keywords" content="{{ config('sximo')['cnf_metakey'] }}">
        <meta name="author" content="{{ config('sximo')['cnf_appname'] }}">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('uploads/images/'.config('sximo')['cnf_logo'])}}" type="image/x-icon">
        <!-- Font CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/fonts/font.css" />
        <!-- Font-Awesome All CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/all.css" />
        <!-- Bootstrap CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css" />
        <!-- Owlcarousel CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css" />
        <!-- Fancybox CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/jquery.fancybox.min.css" />
        <!-- Animate CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/animate.min.css" />
        <!-- colors CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/colors.css" />
        <!-- Styles CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/styles.css" />
        <!-- Live Style Switcher - demo only -->
        <link id="style-switch" href="{{ asset('assets') }}/css/colors/orange.css" media="screen" rel="stylesheet" type="text/css">
        <!-- Responsive CSS -->
        <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/css/responsive.css" />
    </head>
    <body>
        <!-- Body Part Start -->
        <div class="gaspar" data-magic-cursor="show" data-color="crimson">
            <!-- Pre-Loader Start-->
            <div id="preloader">
                <div class="loader_line"></div>
            </div>
            <!-- Pre-Loader end -->
            @include('layouts.default.navigation')