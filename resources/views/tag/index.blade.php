
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">Categories</div> --}}

                    <div class="card-body">
                        <h2 class="section-title list-group">categories</h2>
                        <ul class="list-group">
                            @foreach($tags as $tag)
                                <li class="list-group-item">
                                    <div class="col-md-9" style="margin:auto;">
                                        {{-- <div class="col-md-3"> --}}
                                        <a href="/hobby/tag/{{ $tag->id }}">
                                            <img src="{{ $tag->image }}">
                                        </a>

                                        {{-- tags/Categories for user to search content --}}
                                        <div class="healthyFoodTag">
                                         <a href="/hobby/tag/{{ $tag->id }}"><span style="font-size: 130%;" class="mr-2 badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                       </div> <br>

                                    
                                    
                        

                                    {{-- @can and it can take 2 parameters. One is the ability and the second is model. --}}
                                    @can('update', $tag)
                                        <a class="btn btn-sm" href="/tag/{{ $tag->id }}/edit" style="background-color: #bfd8d5;"><span class="menu__detail"><i class="fas fa-edit"></i> Edit</span></a>
                                    @endcan

                                    {{-- update and this delete our abilities that come from our policies --}}
                                    @can('update', $tag)
                                    <form style="display: inline;" action="/tag/{{ $tag->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <input class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Delete">
                                        </form>
                                    @endcan

                                        <a class="float-right" href="/hobby/tag/{{ $tag->id }}">Used {{ $tag->hobbies->count() }} times</a>
                                        {{-- end of div col-md-3 --}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <br>
                        @can('create', $tag)
                        {{-- <a class="btn btn-success btn-sm mt-3" href="/tag/create"><i class="fas fa-plus-circle"></i> New Tag</a> --}}
                        
                        <div style="text-align: center;"><a class="buttonG" href="/tag/create"><i class="fas fa-plus-circle"></i> Create New Tag</a></div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
