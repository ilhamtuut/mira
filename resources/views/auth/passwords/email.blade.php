@extends('layouts.app')

@section('content')
    <div class="login-forgot1">
      <div class="text-center mb-10">
        <h3 class="text-white">Forgotten Password ?</h3>
        <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
      </div>
        @include('layouts.partials.alert')
      <form class="form" id="kt_login_forgot_form" action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group mb-5">
          <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group d-flex flex-wrap flex-center mt-5">
          <button id="kt_login_forgot_submit" type="submit" class="btn btn-danger btn-block">Request</button>
        </div>
      </form>
      <div class="text-center mt-5">
        <span class="text-white">Back to</span>
        <a href="{{route('login')}}" class="text-muted text-hover-white font-weight-bold">Sign In!</a>
      </div>
    </div>
@endsection
