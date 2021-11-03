@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
@section('action')
<a href="{{route('home')}}" class="badge badge-dark"><i class="fas fa-home text-white"></i> Back to Home</a>
@endsection
