 {{-- DAVALEBA 1 --}}

@extends('layouts.main', [
    'color'=> $theme    
])

@section('title',$title ? $title : "NO TITLE")


@section('content')
{{-- --------------------------- --}}

<img width="300" src="{{ URL::to('logo.png') }}">

@if($show_footer)
@include('components.footer',[
    'footerText' => $footerText,
])


@endif

{{-- --------------------------- --}}
@endsection