@extends('layouts.main')

@section('content')
    <div class="row">
        @if (count($games) == 0)
            <div class="alert alert-warning text-center" style="width: 100%">No Games Yet. C'mon Create Some</div>
        @else
            @foreach ($games as $game)
                @include('components.game-card', ['game' => $game])
            @endforeach
        @endif
    </div>
@endsection
