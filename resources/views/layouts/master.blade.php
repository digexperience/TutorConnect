<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>TutorConnect</title>
        <meta content="Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="assets/images/">
        <link rel="icon" href="{{ URL::asset('assets/ico/Logo.ico') }}" type="image/icon type">
        @include('layouts.head')
  </head>
    <body id="page-top">
        <div id="wrapper">
            @if (Auth()->user()->roles[0]['role'] != '0')
                @include('layouts.sidebar')
            @endif
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('layouts.header')
                    <div class="content-page">  
                        <div class="content">
                            <div class="container-fluid">
                                @yield('content')
                            </div> 
                        </div> 
                    </div> 
                    @include('layouts.footer')
                </div> 
                @include('layouts.flash')
            </div>
        </div>
        @include('layouts.foot')
    </body>
</html>