@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <br>
                    {{-- <div class="card-header">Create New Hobby</div> --}}
                    <h3><span class="section-subtitle about__initial" style="text-align: center">Create Food Recipe</span></h3>
                    <div class="card-body">
                        
                        <form autocomplete="off"  action="/hobby" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" class="form-control{{ $errors->has('image') ? ' border-danger' : '' }}" id="image" name="image" value="">
                                <small class="form-text text-danger">{!! $errors->first('image') !!}</small>
                            </div>

                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control{{ $errors->has('name') ? ' border-danger' : '' }}" id="name" name="name" value="{{old('name')}}">
                                <small class="form-text text-danger">{!! $errors->first('name') !!}</small>
                            </div>

                            <div class="form-group">
                                <label for="description">Describe Taste</label>
                                <textarea class="form-control{{ $errors->has('description') ? ' border-danger' : '' }}" id="description" name="description" rows="5">{{old('description')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('description') !!}</small>

                                <label for="ingredients">Ingredients</label>
                                <textarea class="form-control{{ $errors->has('ingredients') ? ' border-danger' : '' }}" id="ingredients" name="ingredients" rows="5">{{old('ingredients')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('ingredients') !!}</small>

                                <label for="recipe">Recipe</label>
                                <textarea class="form-control{{ $errors->has('recipe') ? ' border-danger' : '' }}" id="recipe" name="recipe" rows="5">{{old('recipe')}}</textarea>
                                <small class="form-text text-danger">{!! $errors->first('recipe') !!}</small>


                                {{-- <small class="form-text text-danger">{!! $errors->first('description') !!}</small> --}}
                            </div>
                            <input class="auth" type="submit" value="Save Food Recipe">
                            {{-- <input class="btn btn-primary mt-4" type="submit" value="Save Hobby"> --}}
                        </form>
                        <a class="buttonG float-right" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Back</a>
                        {{-- <a class="btn btn-primary float-right" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Back</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection     