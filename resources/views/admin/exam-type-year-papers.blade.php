@extends('admin.layouts.main')
@push('title')
<title>{{ $page_title }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('main-section')
@endsection