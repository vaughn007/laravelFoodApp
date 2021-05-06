@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    {{-- <div class="card-header"><h1 >{{$hobby->name}}</h1></div> --}}
                    {{-- <span class="section-subtitle about__initial">About me</span> --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                             <div class="recipe-method-step-content">
                                <h1 class="section-subtitle about__initial">{{$hobby->name}}</h1>
                                <h3> Ingredients</h3>
                                <pre class="about__description">{{$hobby->ingredients}}</pre>
                                <h3> Recipe</h3>
                                <pre class="about__description">{{$hobby->recipe}}</pre>

                                <h3> Description</h3>
                                <pre class="about__description">{{$hobby->description}}</pre>
                             </div>
                                @if($hobby->tags->count() > 0)
                                <p>Category:</p>
                                @endif
                                {{-- tags for user to search content --}}
                                <p>@foreach($hobby->tags as $tag)
                                        <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                    @endforeach

                                </p>
                                @if($hobby->tags->count() > 0)
                                {{-- only owner of post can remove tags and see buttons.  @can('ability', model)  --}}
                                @can('update', $hobby) 
                                    <b>Used Tags:</b> (Click to remove)
                                    <p>
                                @endcan
                                        @foreach($hobby->tags as $tag)
                                        {{-- users can click tags to search --}}
                                        {{-- <a href="/hobby/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a> --}}
                                        
                                        @can('update', $hobby)    
                                        {{-- remove tag from list --}}
                                            <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                        @endcan
                                        @endforeach
                                    </p>
                                @endif
                                
                                {{--  Assign Tags --}}
                                @auth
                                @if($availableTags->count() > 0)
                                @can('update', $hobby)
                                    <b>Available Tags:</b> (Click to assign tag {{ $hobby->user->name }} )
                                    <p>
                                @endcan        
                                        @foreach($availableTags as $tag)
                                        {{-- the owner of this post will only be able to see and add tags. @can('ability', model) --}}

                                        @can('update', $hobby)
                                            <a  href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                            @endcan
                                        @endforeach
                                    </p>
                                @endif
                                @endauth
                                
                            </div>
                            <div class="col-md-3" style="margin-top: 8px;">
                                {{-- @if(Auth::user() && file_exists('img/hobbies/' . $hobby->id . '_large.jpg')) --}}
                                <a href="/img/hobbies/{{$hobby->id}}_large.jpg" data-lightbox="img/hobbies/{{$hobby->id}}_large.jpg" data-title="{{ $hobby->name }}">
                                    <img class="img-fluid" src="/img/hobbies/{{$hobby->id}}_large.jpg" alt="">
                                </a>
                                <a href="/img/hobbies/{{$hobby->id}}_large.jpg" data-lightbox="img/hobbies/{{$hobby->id}}_large.jpg" data-title="{{ $hobby->name }}">
                                    <i class="fa fa-search-plus"></i> Click image to enlarge</a>
                                {{-- @endif --}}

                                {{-- if not logged in pixelated jpg image --}}
                                {{-- @if(!Auth::user() && file_exists('img/hobbies/' . $hobby->id . '_pixelated.jpg'))
                                <img class="img-fluid" src="/img/hobbies/{{$hobby->id}}_pixelated.jpg" alt="">
                                
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="mt-2">
                    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"><i class="fas fa-arrow-circle-up"></i> Back to Overview</a>
                </div>
                -->
            </div>
        </div>
    </div>
@endsection