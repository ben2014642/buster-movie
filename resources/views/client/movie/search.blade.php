@extends('layouts.master')
@section('content')
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>Search Results</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ route('movie') }}">Movie Listing</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> Search</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="flex-wrap-movielist">
                        @foreach ($movies as $item)
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="">
                                <div class="hvr-inner">
                                    <a href="{{ route('movie.view',$item->slug) }}"> Read more <i
                                            class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <h6><a href="{{ route('movie.view',$item->slug) }}">{{ $item->title }}</a></h6>
                                    <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{-- pagination --}}
                    <div class="topbar-filter">
                        <label>Total Movies Results:</label>
                        <p class="sb-title">{{ count($movies) }} Movies</p>

                        {{-- <div class="pagination2"> --}}
                        {{-- {{ $movies->links('pagination::bootstrap-4') }} --}}
                        {{-- </div> --}}
                    </div>
                </div>

                {{-- SEARCH MOVIE --}}
                
            </div>
        </div>
    </div>
@endsection
