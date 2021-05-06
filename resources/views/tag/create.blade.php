@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    {{-- <div class="card-header">Create New Tag</div> --}}
                    <h3><span class="section-subtitle about__initial" style="text-align: center">Create New Tag</span></h3>
                    <div class="card-body">
                        
                        <form action="/tag" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{old('name')}}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="style">Style</label>
                                <input type="text" class="form-control{{ $errors->has('style') ? ' border-danger' : '' }}" id="style" name="style" value="{{old('style')}}">
                                <small class="form-text text-danger">{!! $errors->first('style') !!}</small>
                            </div>

                            {{--image  --}}
                            <div class="form-group">
                                <label for="Image">Image URL</label>
                                <input type="text" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="name" value="{{old('image')}}">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>



                            {{-- <input class="btn btn-primary mt-4" type="submit" value="Save Tag"> --}}
                            <input class="auth" type="submit" value="Save Tag">
                        </form>
                        <a class="buttonG float-right" href="/tag"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection     