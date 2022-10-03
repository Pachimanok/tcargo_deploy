@extends('layouts.auth')

@section('content')

    <div class="m-login__signin">

        <div class="m-login__head">
            <h3 class="m-login__title">
                {{ __('messages.do_login') }}
            </h3>
        </div>

        <form class="m-login__form m-form" method="POST" action="{{ route('login') }}">
           
            {{ csrf_field() }}

            <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
                
                <input class="form-control m-input" value="{{ old('email') }}" type="text" placeholder="{{__('user.email')}}" name="email" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif

            </div>


            <div class="form-group m-form__group">

                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{__('user.password')}}" name="password">

                <input type="hidden" name="password_decoy">
                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif

            </div>


            <div class="row m-login__form-sub">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--light">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.remember_me') }} 
                        <span></span>
                    </label>
                </div>

                <div class="col m--align-right m-login__form-right">
                    <a href="{{ route('password.request') }}" class="m-link">
                        {{ __('messages.forgot_password') }}
                    </a>
                </div>

            </div>

            <div class="m-login__form-action">
                <button type="submit" id="zm_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom btn-lg m-login__btn">
                    {{ __('nav.signin') }}
                </button>
            </div>

        </form>

    </div>

@endsection
