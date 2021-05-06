@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">

                    @isset($filter)
                        {{-- <div class="card-header">Filtered food by --}}
                        <div class="section-subtitle about__initial" style="text-align: center; color:#707070;">Filtered food by
                            <span style="font-size: 130%;" class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                            {{-- <span class="float-right"><a href="/hobby">Show all Food</a></span> --}}
                        </div>
                    @else
                        <div class="tasty"><span class="section-subtitle">Tasty</span></div>
                        <h2 class="section-title-food">Healthy Food Hobbies</h2>
                        {{-- <div class="section-title">Healthy Recipes</div> --}}
                        {{-- <div class="card-header">Healthy Food Hobbies</div> --}}
                    @endisset

                    <section class="menu section bd-container" id="menu">
                        {{-- <h2 class="section-title">Healthy Food Hobbies</h2> --}}
        
                        <div class="menu__container bd-grid">
                            @foreach($hobbies as $hobby)
                            {{-- <div class="menu__content foodCard-img" style="background-image:url('img/FoodCategories/wood-texture.jpg')"> --}}
                                <div class="menu__content">
                                @if(file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg'))
                                <a title="Show Details" href="/hobby/{{ $hobby->id }}">
                                    <img class="round" src="/img/hobbies/{{$hobby->id}}_large.jpg" alt="">
                                {{-- <img class="round" src="/img/hobbies/{{ $hobby->id }}_thumb.jpg" alt="Food Thumb"> --}}
                                {{-- <img style="max-width: 400px; max-height: 300px;" src="/img/hobbies/{{$hobby->id}}_large.jpg" alt=""> --}}
                                </a>
                                @endif
                                <h3 class="menu__name"><a href="/hobby/{{ $hobby->id }}">{{ Str::limit($hobby->name, 13) }}</a></h3>
                                <span class="menu__detail">Delicious grub</span>
                                <span class="menu__preci">
                                    @if(file_exists('img/users/' . $hobby->user->id . '_thumb.jpg'))
                                    {{-- Image of user --}}
                                    <a href="/user/{{ $hobby->user->id }}"><img class="userOnCard"  src="/img/users/{{$hobby->user->id}}_thumb.jpg" ></a>
                                    
                                    @else
                                    <i class="fas fa-user-circle fa-3x"></i>

                                @endif
                                    </i> <a href="/user/{{ $hobby->user->id }}">{{ Str::limit($hobby->user->name, 10) }} </a>
                                {{-- <span class="menu__preci"><span class="mx-2">Posted by: <a href="/user/{{ $hobby->user->id }}">{{ Str::limit($hobby->user->name, 6) }} ({{ $hobby->user->hobbies->count() }} Meals)</a> --}}
                                    

                                </span>
                                <span class="menu__detail">
                                    @auth
                                    @can('update', $hobby)
                                    <br>
                                    <a  href="/hobby/{{ $hobby->id }}/edit"><span class="menu__detail"><i class="fas fa-edit"></i> Edit</span></a>
                                    
                                    @endcan
                                    @endauth
                                </span>
                                <br>
                                @auth
                                <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    @can('update', $hobby)
                                    <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                    @endcan
                                </form>
                                @endauth
                                {{-- <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span></span> --}}
                            </div>
                            @endforeach
                            
                        </div>
                    
                    </section>
                    
                    
                    
                    {{-- <div class="card-body">
                        <ul class="list-group">
                            @foreach($hobbies as $hobby)
                                <li class="list-group-item">
                                    @if(file_exists('img/hobbies/' . $hobby->id . '_thumb.jpg'))
                                    <a title="Show Details" href="/hobby/{{ $hobby->id }}">
                                        <img src="/img/hobbies/{{ $hobby->id }}_thumb.jpg" alt="Hobby Thumb">
                                    </a>
                                    @endif
                                        &nbsp;<a title="Show Details" href="/hobby/{{ $hobby->id }}">{{ $hobby->name }}</a>
                                    @auth
                                    @can('update', $hobby)
                                    <a class="btn btn-sm btn-light ml-2" href="/hobby/{{ $hobby->id }}/edit"><i class="fas fa-edit"></i> Edit Hobby</a>
                                    @endcan
                                    @endauth
                                    <span class="mx-2">Posted by: <a href="/user/{{ $hobby->user->id }}">{{ $hobby->user->name }} ({{ $hobby->user->hobbies->count() }} Hobbies)</a>

                                    </span>
                                    @auth
                                    <form class="float-right" style="display: inline" action="/hobby/{{ $hobby->id }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        @can('update', $hobby)
                                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                        @endcan
                                    </form>
                                    @endauth
                                    <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                    <br>
                                    
                                </li>
                            @endforeach
                        </ul>
                    </div> --}}
                </div>

                <div class="mt-3">
                    {{ $hobbies->links() }}
                </div>
                @auth
                <div class="mt-2" style="text-align: center !important">
                    <a class="buttonG" href="/hobby/create"><i class="fas fa-plus-circle"></i> Add New Recipe</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
@endsection