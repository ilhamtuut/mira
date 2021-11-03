@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __('Page Expired'))
@section('action')
<a href="{{route('home')}}" class="badge badge-dark"><i class="fas fa-home text-white"></i> Back to Home</a>
@endsection
