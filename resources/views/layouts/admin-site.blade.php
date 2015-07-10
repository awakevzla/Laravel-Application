@extends('layouts.master')

@section('title')
    {{$farm->name}}
@endsection
@section('styles')
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/admin-site-styles.css">
@endsection
@section('layout')
    <div class="container-fluid">
        <div class="header row">
            <h1>{{$farm->name}} <small>Administrative Panel</small></h1>
        </div>
        <div class="row">
            <div class="sidebar col-sm-3">
                @include('layouts.admin-site.sidebar')
            </div>
            <div class="content col-sm-7">
                @yield('content')
            </div>
        </div>
    </div>
@endsection