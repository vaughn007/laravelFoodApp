@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h2 class="section-subtitle about__initial">{{ auth()->user()->name }}</h2>
                            <h5>Motto</h5>
                            <p>{{ auth()->user()->motto ?? '' }}</p>
                            <span class="section-subtitle about__initial">About me </span>
                            <pre>{{ auth()->user()->about_me ?? '' }}</pre>
                            <p>
                                {{-- <a class="btn btn-primary" href="user/{{ auth()->user()->id }}/edit">Edit my profile</a> --}}
                                <a class="buttonG" href="user/{{ auth()->user()->id }}/edit">Edit my profile</a>
                            </p>
                        </div>
                        @if(file_exists('img/users/' . auth()->user()->id . '_large.jpg'))
                        <div class="col-md-3">
                            {{-- profile image --}}
                            <img class="img-thumbnail" src="/img/users/{{ auth()->user()->id }}_large.jpg" alt="{{ auth()->user()->name }}" style="border-radius: 50%">
                        </div>
                        @endif
                    </div>
                    <br><br>


                    @isset($hobbies)
                        @if($hobbies->count() > 0)
                        <hr>
                        <h3>Food Recipes</h3>
                        @endif
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            {{-- <li class="list-group-item"> --}}
                                <li>
                                @if(file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg'))
                                    <a title="Show Details" href="/hobby/{{ $hobby->id }}">
                                        <img src="/img/hobbies/{{ $hobby->id }}_thumb.jpg" alt="Profile Thumb">
                                    </a>
                                @endif
                                &nbsp;<a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                @auth
                                    <a class="btn btn-sm btn-light ml-2" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i> Edit Food</a>
                                @endauth

                                @auth
                                    <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    </form>
                                @endauth
                                <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                <br>
                                @foreach($hobby->tags as $tag)
                                    <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a><br><br>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                    
                    @endisset
                    <br> <br>
                    {{-- <a class="btn btn-success btn-sm" href="/hobby/create"><i class="fas fa-plus-circle"></i> Create New Food Recipe</a> --}}
                    <a class="buttonG" href="/hobby/create"><i class="fas fa-plus-circle"></i> Create New Food Recipe</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
