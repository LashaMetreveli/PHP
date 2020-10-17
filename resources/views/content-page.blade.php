@extends('layouts.main', [
    'color'=> $color    
])

@section('title',$test_title)


@section('content')

<h1>{{ $text }}</h1>

@if($show_button)
@include('components.button',[
    'buttonText' => $text,
])
@endif

@endsection