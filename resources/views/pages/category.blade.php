<?php
use App\Models\Category; ?>
@extends('layouts.main')

@section('content')
    <div class="row">
        @include('components.post-card', ['posts' => $posts]);
    </div>
@endsection
