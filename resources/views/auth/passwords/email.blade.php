@extends('layouts.auth')

@section('content')

    <div class="">
        <div class="m-login__head">
            <h3 class="m-login__title">
                {{__('messages.dont_worry')}}
            </h3>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @else
                <div class="m-login__desc">
                    {{__('messages.recover_pass_instructions')}}
                </div>        
            @endif    

        </div>

        <form class="m-login__form m-form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}  

            <div class="form-group m-form__group {{ $errors->has('email') ? ' has-error' : '' }}">
                
                <input class="form-control m-input" type="text" placeholder="{{__('user.email')}}" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif

            </div>

            <div class="m-login__form-action">

                <a href="{{route('login')}}" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
                    {{__('nav.cancel')}}
                </a>

                &nbsp;&nbsp;

                <button type="submit" id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-login__btn m-login__btn--primary">
                    {{__('messages.send_password_reset_link')}}
                </button>


            </div>

        </form>

    </div>


@endsection
