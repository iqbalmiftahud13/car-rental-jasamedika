 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Multikarya Indoreka dashboard">
     <meta name="author" content="fitechsolution">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     {{-- <link rel="icon" href{{ asset('assets/images/logo-mki.png') }}" type="image/x-icon"> --}}
     {{-- <link rel="shortcut icon" href{{ asset('assets/images/logo-mki.png') }}" type="image/x-icon"> --}}
     <title>@yield('title')</title>
     <!-- Google font-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link
         href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
         rel="stylesheet">
     <link
         href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
         rel="stylesheet">
     <link
         href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
         rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
     <!-- ico-font-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
     <!-- Themify icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
     <!-- Flag icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
     <!-- Feather icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
     <!-- Plugins css start-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
     <!-- Plugins css Ends-->
     <!-- Bootstrap css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>

     <!-- App css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
     <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
     <!-- Responsive css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

     @stack('prepend-style')
     @include('partials.styles')
     @stack('addon-style')
 </head>
