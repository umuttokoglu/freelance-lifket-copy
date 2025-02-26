@extends('layout.admin.index')

@section('adminPageTitle', __('admin/dashboard.title'))

@section('content')

@endsection

@section('adminPageCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/dark/elements/alert.css') }}">
@endsection
