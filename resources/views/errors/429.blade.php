@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('action')
<a href="{{route('home')}}" class="badge badge-dark"><i class="fas fa-home text-white"></i> Back to Home</a>
@endsection
