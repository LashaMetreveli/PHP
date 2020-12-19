@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Game You Want To Play In Future</div>

                    <div class="card-body">
                        <form method="POST"
                            {{-- action="{{ isset($game) ? route('game.update', ['game' => $game->id]) : route('game.create') }}" --}}
                            action="{{route('game.add')}}"
                            enctype="multipart/form-data">
                            @csrf

                            @if (isset($game))
                                <input type="hidden" name="_method" value="PUT" />
                            @endif

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Game Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($game) ? $game->name : old('name') }}"
                                        requiredautofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Game Slug</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                                        value="{{ isset($game) ? $game->slug : old('slug') }}" requiredautofocus>

                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Your Rating</label>

                                <div class="col-md-6">
                                    <input type="number"  max="5" class="form-control @error('slug') is-invalid @enderror" name="stars"
                                        value="{{ isset($game) ? $game->stars : old('stars') }}" requiredautofocus>

                                    @error('stars')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Enter Game Category</label>

                                <div class="col-md-6">
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option value=""></option>
                                        @foreach ($categories as $cat)
                                            <option @if (isset($game) && $cat->id == $game->category_id)
                                                selected=""
                                        @endif
                                        value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Upload Game Image</label>

                                <div class="col-md-6">
                                    @if (isset($game))
                                        <img src="{{ url($game->image) }}" width="100" height="100"
                                            style="padding-bottom: 10px;">
                                    @endif
                                    <input type="file" class="form-file-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ old('image') }}" requiredautofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Describe Game</label>

                                <div class="col-md-6">
                                    <textarea name="description" class="form-control @error('image') is-invalid @enderror"
                                        id="description" cols="30"
                                        rows="10">{{ isset($game) ? $game->description : old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ isset($game) ? 'Edit' : 'Create' }} Game
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
