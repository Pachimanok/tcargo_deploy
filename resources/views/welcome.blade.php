<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.analytics')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{__('nav.browser_default_title')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #450102;
                color: #eee;
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #ddd;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @include('includes.analytics_body')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{__('nav.signed_home')}}</a>
                    @else
                        <!--
                        <a href="{{ route('login') }}">{{__('titles.login')}}</a>
                        <a href="{{ route('register') }}">{{__('titles.signup')}}</a>
                        -->
                    @endauth
                </div>
            @endif

            <div class="content">
                
                <div>
                    <img src="{{ asset('img/tcargo-logo.png') }}">
                </div>
                <h3>
                    {{__('nav.landing_intro_text')}}
                </h3>
                <p style="margin:80px 0 45px 0;">
                    <a style="border:1px solid red; padding:20px; background-color: #da2127; color:#eee; border-radius:36px; font-weight: 300; box-shadow:1px 1px 4px #222; text-decoration: none;" class="btn btn-success btn-large" href="{{ route('register') }}">{{__('nav.signup_now')}}</a>
                </p>
                <p style="">
                    <a style="color:#eee; font-weight:300; " class="btn btn-success btn-large" href="{{ route('login') }}">{{__('nav.already_have_account')}}</a>
                </p>                
            </div>
        </div>
    </body>
</html>
