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

        <link href="{{ asset('css/style.login.css') }}" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />

    </head>

    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        @include('includes.analytics_body')
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="<?/*background-image: url({{ asset('img/bg-2.jpg') }});*/?> background-color:#450102;">

                <div class="m-grid__item m-grid__item--fluid    m-login__wrapper">

                    <div class="m-login__container">

                        <div class="m-login__logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/tcargo-logo.png') }}">
                            </a>
                        </div>
                        
                        @yield('content')

                        @if (Route::current()->uri != 'register') 
                        
                        <div class="m-login__account">
                            <span class="m-login__account-msg">
                                    {{__('messages.dont_have_account')}}
                            </span>
                            &nbsp;&nbsp;
                            <a href="{{ route('register') }}" class="m-link m-link--light m-login__account-link">
                                {{__('auth.create_account')}}
                            </a>
                        </div>

                        @endif

                    </div>

                </div>

            </div>

            <div class="footer" style="background:#350001;">

                <span>{{__('nav.system_title')}}</span>
            
                <span class="pull-right">{{__('messages.all_rights_reserved')}}</span> 
            
            </div>

        </div>           
    
        <!-- Scripts -->
        <script src="{{ asset('js/vendors.bundle.js') }}"></script>

        <script src="{{ asset('js/scripts.bundle.js') }}"></script>

    </body>

</html>
