@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('action')
<a href="{{route('home')}}" class="badge badge-dark"><i class="fas fa-home text-white"></i> Back to Home</a>
@endsection
