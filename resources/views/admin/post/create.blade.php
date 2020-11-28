@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create New Post</div>

            <div class="card-body">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
                                value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                                <div class="form-group row">
                                    <label for="text" class="col-md-4 col-form-label text-md-right">Text</label>
        
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="text" id="text" cols="30" rows="10"></textarea>
        
                                        @error('text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                
                                <div class="form-group row">
                                    <label  class="col-md-4 col-form-label text-md-right">Image</label>
        
                                    <div class="col-md-6">
                                        <input style="border: none" id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" 
                                        value="{{ old('text') }}" required autocomplete="image" autofocus>
        
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Create Post
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