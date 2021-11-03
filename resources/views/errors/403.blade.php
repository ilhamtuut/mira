@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('action')
<a href="{{route('home')}}" class="badge badge-dark"><i class="fas fa-home text-white"></i> Back to Home</a>
@endsection
