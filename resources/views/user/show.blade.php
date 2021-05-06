@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <br>
                    {{-- <div style="font-size: 150%;" class="card-header">{{ $user->name }}</div> --}}
                    {{-- <h1 class="section-subtitle about__initial" style="text-align: center">{{$user->name}}</h1> --}}

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 >{{$user->name}}</h5>
                                <strong>My Motto:</strong>
                                <p>{{$user->motto}}</p>
                                <div class="mt-2">
                                    <p style="color: #069c54 !important"> About me:</p>
                                    <pre>{{$user->about_me}}</pre>
                                </div>
                                <br>

                                <h5>Food Recipes:</h5>
                                <ul class="list-group">
                                    @if($user->hobbies->count() > 0)
                                        @foreach($user->hobbies as $hobby)
                                            <li class="list-group-item">
                                                @if(file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg'))
                                                    <a title="Show Details" href="/hobby/{{ $hobby->id }}">
                                                        <img src="/img/hobbies/{{ $hobby->id }}_thumb.jpg" alt="Hobby Thumb">
                                                    </a>
                                                @endif
                                                &nbsp;<a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                                <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                                <br>
                                                @foreach($hobby->tags as $tag)
                                                    <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                                @endforeach
                                            </li>
                                        @endforeach
                                </ul>
                                @else
                                    <p>
                                        {{ $user->name }} has not created any food recipes yet.
                                    </p>
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if(Auth::user() && file_exists('img/users/' . $user->id . '_large.jpg'))
                                    <img class="img-thumbnail" src="/img/users/{{$user->id}}_large.jpg" alt="{{ $user->name }}" style="border-radius: 50%">
                                @endif

                                @if(!Auth::user() && file_exists('img/users/' . $user->id . '_large.jpg'))
                                    <img class="img-thumbnail" src="/img/users/{{$user->id}}_large.jpg" alt="{{ $user->name }}" style="border-radius: 50%">
                                @endif

                                {{-- @if(!Auth::user() && file_exists('img/users/' . $user->id . '_pixelated.jpg'))
                                    <img class="img-thumbnail" src="/img/users/{{$user->id}}_pixelated.jpg" alt="{{ $user->name }}">
                                @endif --}}
                            </div>
                        </div>


                    </div>

                </div>

                <div class="mt-4">
                    {{-- <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a> --}}
                    <a class="buttonG" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>
            </div>
        </div>
    </div>
@endsection