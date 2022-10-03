<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            {{ __('nav.browser_default_title') }}
        </title>
        <meta name="description" content="{{ config('app.description', 'Velty') }}">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!--end::Web font -->
        <link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--<link href="{{ asset('css/style.template.css') }}" rel="stylesheet" type="text/css" />-->
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />
       
    </head>
   
    <!-- end::Body -->
    <body  class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
               
            <div class="m-grid__item m-grid__item--fluid m-grid  m-error-5" style="background-image: url({{ asset('img/bg5.jpg') }});">
                <div class="m-error_container">
                    <span class="m-error_title">
                        <h1>{{__('messages.oops')}}</h1>       
                    </span>         
                    <p class="m-error_subtitle">
                        {{__('messages.something_wrong')}}
                    </p>    
                    <p class="m-error_description" style="max-width:500px;">
                        {{__('messages.possible_error_causes')}}
                    </p>     
                </div>   
            </div>              
        </div>
<!-- end:: Page -->
        <script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>                
    </body>
</html>
