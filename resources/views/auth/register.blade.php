@extends('layouts.auth')

@section('content')

    <div class="mt-5">
        <div class="m-login__head">
            <h3 class="m-login__title">
                {{ __('messages.create_account') }}:
            </h3>
            <div class="m-login__desc">
                {{ __('messages.signup_instructions') }}:
            </div>
        </div>

        <form class="m-login__form m-form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}            

            <div class="row p-2">
                <div class="col">
                    <label class="m-radio">
                        <input type="radio" name="shipping_company" value="0" @if(!old('shipping_company')) checked @endif> {{__('auth.register_as_client')}} 
                        <span></span>
                    </label>
                </div>
                <div class="col">
                    <label class="m-radio">
                        <input type="radio" name="shipping_company" value="1" @if(old('shipping_company')) checked @endif> {{__('auth.register_as_shipping_company')}} 
                        <span></span>
                    </label>
                </div>
            </div>

            <div class="form-group m-form__group {{ $errors->has('name') ? ' has-error' : '' }}">
                <input class="form-control m-input" type="text" placeholder="{{__('user.full_name')}}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                @endif
            </div>

            <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-control m-input" type="text" placeholder="{{__('user.email')}}" name="email" value="{{ old('email') }}" required autocomplete="off">
                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif 
            </div>

            <div class="form-group m-form__group {{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-control m-input" type="password" placeholder="{{__('user.password')}}" name="password" required>
                <input type="hidden" name="password_decoy">
                @if ($errors->has('password'))
                    <span class="help-block">
                        {{ $errors->first('password') }}
                    </span>
                @endif
            </div>

            <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{__('passwords.confirm_password')}}"  name="password_confirmation" required>
            </div>

            <div class="m-login__form-action">

                <a href="{{route('login')}}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
                    {{__('auth.login')}}
                </a>

                &nbsp;&nbsp;

                <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom   m-login__btn">
                    {{__('messages.create_account')}}
                </button>

            </div>
        </form>
    </div>


@endsection
