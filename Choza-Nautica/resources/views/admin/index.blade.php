@extends('adminlte::page')

@section('title', 'Dashboard')

<style>
    .table {
        max-width: none;
        table-layout: fixed;
        word-wrap: break-word;
    }
    </style>
@section('content')
    @yield('content')
@stop