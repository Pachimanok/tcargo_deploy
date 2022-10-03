<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.analytics')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            {{ __('nav.browser_default_title') }}
        </title>
        <meta name="description" content="{{ config('app.description', 'Velty') }}">
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADRr3rCBEra-k__Nfd5nf1wg7hVzeGqF0&libraries=places"></script>        
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

    <body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default"  style="background:#fbfbfb;">
        @include('includes.analytics_body')
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page"> 
            <!-- begin::Header -->
            <header class="m-grid__item m-header "  data-minimize="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
            @include('includes.topbar') 
            @include('includes.navbar')
            </header>
            <!-- end::Header -->    

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
                <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver m-container m-container--fluid m-container--xxl m-page__container">
                    <div class="m-grid__item m-grid__item--fluid m-wrapper">
                        @include('includes.messages')
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- end::Body -->
            
            @include('includes.footer')

        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('js/tcargo.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

        @if(isset($load_scripts))
            @foreach ($load_scripts as $script) 
                <script src="{{ asset('js/'.$script) }}"></script>
            @endforeach
        @endif


        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

        <!-- The Modal -->
        <div class="modal fade" id="general_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- CONTENT IS LOADED HERE -->
                </div>
            </div>
        </div>
        
        @include('includes.alerts')

    </body>
</html>