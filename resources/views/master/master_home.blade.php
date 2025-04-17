@extends('master.master')
@section('main.header')
    @include('layout.header')
@endsection

@section('main.content')
    @yield('main_home_content')
@endsection

@section('main.footer')
    @include('layout.footer')
@endsection