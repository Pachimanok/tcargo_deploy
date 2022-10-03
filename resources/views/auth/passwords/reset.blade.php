@extends('layouts.auth')

@section('content')

    <div class="">
        <div class="m-login__head">
            <h3 class="m-login__title">
                {{__('Reset Password')}}
            </h3>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>        
            @endif    

        </div>


        <form class="m-login__form m-form" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}  

            <input type="hidden" name="token" value="{{ $token }}">


            <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
                
                <input class="form-control m-input" type="text" id="email" placeholder="{{__('user.email')}}" name="email" value="{{ $email or old('email') }}">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif

            </div>


            <div class="form-group m-form__group {{ $errors->has('password') ? ' has-error' : '' }}">
                
                <input id="password" class="form-control m-input" type="password" name="password" required  placeholder="{{__('auth.password')}}">
                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif

            </div>


            <div class="form-group m-form__group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                
                <input class="form-control m-input" id="password-confirm" type="password" name="password_confirmation" placeholder="{{__('passwords.confirm_password')}}">
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                @endif

            </div>            

            <div class="m-login__form-action">

                <a href="{{route('login')}}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
                    {{__('nav.cancel')}}
                </a>

                &nbsp;&nbsp;

                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-login__btn m-login__btn--primary">
                    {{__('passwords.reset_password')}}
                </button>

            </div>

        </form>

    </div>

@endsection
