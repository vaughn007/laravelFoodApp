@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <br>
                <div class="card">
                    {{-- <div class="card-header">Edit Tag</div> --}}
                    <h3><span class="section-subtitle about__initial" style="text-align: center">Edit Tag</span></h3>
                    <div class="card-body">
                        
                        
                        <form action="/tag/{{$tag->id}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{ old('name') ?? $tag->name }}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="style">Style</label>
                                <input type="text" class="form-control{{ $errors->has('style') ? ' border-danger' : '' }}" id="style" name="style" value="{{ old('style') ?? $tag->style }}">
                                <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                            </div>

                            {{-- image --}}
                            <div class="mb-2">
                                <img style="max-width: 400px; max-height: 300px;" src="{{ old('image') ?? $tag->image }}" alt="">   
                                
                            </div>

                            <div class="form-group">
                                <label for="image">Image URL</label>
                                <input type="text" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="{{ old('image') ?? $tag->image }}">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>
                            

                            {{-- <input class="btn btn-primary mt-4" type="submit" value="Update Style"> --}}
                            <input class="auth" type="submit" value="Update Style">
                        </form>
                        {{-- <a class="btn btn-primary float-right" href="/tag"><i class="fas fa-arrow-circle-up"></i> Back</a> --}}
                        <a class="buttonG float-right" href="/tag"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection     