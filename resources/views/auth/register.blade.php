@extends('layouts.app')

@section('content')
    <div class="login-signup1">
      <div class="text-center mb-5">
        <h3 class="text-white">Sign Up</h3>
        <div class="text-muted font-weight-bold">Enter your details to create your account</div>
      </div>
        @include('layouts.partials.alert')
      <form class="form" id="kt_login_signup_form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group mb-5">
          <input class="form-control" type="text" placeholder="Username" name="username" />
        </div>
        <div class="form-group mb-5">
          <input class="form-control" type="text" placeholder="Full Name" name="name" />
        </div>
        <div class="form-group mb-5">
          <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off" />
        </div>
        <div class="form-group mb-5">
          <input class="form-control" type="text" placeholder="Phone Number" name="phone_number" autocomplete="off" />
        </div>
        <div class="form-group mb-5">
          <input class="form-control" type="password" placeholder="Password" name="password" />
        </div>
        <div class="form-group mb-5 text-left">
          <div class="checkbox-inline">
            <label class="checkbox m-0 text-white">
            <input type="checkbox" name="agree" />
            <span></span>I Agree the
            <a href="#" class="text-danger text-hover-white font-weight-bold ml-1">terms and conditions</a>.</label>
          </div>
          <div class="form-text text-muted text-center"></div>
        </div>
        <div class="form-group d-flex flex-wrap flex-center mt-5">
          <button id="kt_login_signup_submit" class="btn btn-danger btn-block">Sign Up</button>
        </div>
      </form>
      <div class="text-center mt-3">
        <a href="{{route('login')}}" class="text-muted text-hover-white font-weight-bold">Sign In to account!</a>
      </div>
    </div>
@endsection
