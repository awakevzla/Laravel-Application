@extends('layouts.admin-site')

@section('title')
    @parent
    - Shares
@endsection
@section('styles')
    @parent
    <style>
        h1 {
            color: red;
        }
    </style>
@endsection
@section('content')
    <table class="table table-hover">
        <thead>
        <th>Name</th>
        <th>Email</th>
        </thead>
        <tbody>
        <tr>
            <td>A NAME</td>
            <td>EMAIL ADDRESS</td>
        </tr>
        </tbody>
    </table>
@endsection