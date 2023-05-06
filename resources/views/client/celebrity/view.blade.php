@extends('layouts.master')
@section('content')
    <div class="hero hero3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h1> movie listing - list</h1>
                            <ul class="breadcumb">
                             <li class="active"><a href="#">Home</a></li>
                             <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
                            </ul> -->
                </div>
            </div>
        </div>
    </div>
    <div class="page-single movie-single cebleb-single">
        <div class="container">
            <div class="row ipad-width">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="mv-ceb">
                        <img src="{{ Storage::url($celebrity->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="movie-single-ct">
                        <h1 class="bd-hd">{{ $celebrity->name }}</h1>
                        <p class="ceb-single">{{ $celebrity->country }}</p>
                        <div class="social-link cebsingle-socail">
                            <a href="#"><i class="ion-social-facebook"></i></a>
                            <a href="#"><i class="ion-social-twitter"></i></a>
                            <a href="#"><i class="ion-social-googleplus"></i></a>
                            <a href="#"><i class="ion-social-linkedin"></i></a>
                        </div>
                        <div class="movie-tabs">
                            <div class="tabs">
                                <ul class="tab-links tabs-mv">
                                    <li class="active"><a href="#overviewceb">Overview</a></li>
                                    {{-- <li class=""><a href="#biography"> biography</a></li> --}}
                                    <li class=""><a href="#filmography">filmography</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overviewceb" class="tab active" style="">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <p>{{ $celebrity->introduce }}</p>
                                                <div class="title-hd-sm">
                                                    <h4>Videos &amp; Photos</h4>
                                                    <a href="#" class="time">All {{ count($photoAlbums) }} Photos <i
                                                            class="ion-ios-arrow-right"></i></a>
                                                </div>
                                                <div class="">
                                                    @foreach ($photoAlbums as $item)
                                                        <img width="100px" src="{{ $item->url }}" alt="">
                                                    @endforeach
                                                </div>
                                                <div class="title-hd-sm">
                                                    <h4>filmography</h4>
                                                    <a href="#filmography" class="time">Full Filmography<i
                                                            class="ion-ios-arrow-right"></i></a>
                                                </div>
                                                <!-- movie cast -->
                                                <div class="mvcast-item">
                                                    @foreach ($limitMovies as $item)
                                                        <div class="cast-it">
                                                            <div class="cast-left cebleb-film">
                                                                <img style="width: 50px"
                                                                    src="{{ Storage::url($item->thumbnail) }}"
                                                                    alt="">
                                                                <div>
                                                                    <a href="{{ route('movie.view',$item->slug) }}">{{ $item->title }}</a>
                                                                </div>

                                                            </div>
                                                            <p>... {{ Str::substr($item->release_date, 0, 4) }}</p>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-12 col-sm-12">
                                                <div class="sb-it">
                                                    <h6>Fullname: </h6>
                                                    <p><a href="#">{{ $celebrity->name }}</a></p>
                                                </div>

                                                <div class="sb-it">
                                                    <h6>Country: </h6>
                                                    <p>{{ $celebrity->country }}</p>
                                                </div>

                                                {{-- <div class="sb-it">
                                                    <h6>Keywords:</h6>
                                                    <p class="tags">
                                                        <span class="time"><a href="#">jackman</a></span>
                                                        <span class="time"><a href="#">wolverine</a></span>
                                                        <span class="time"><a href="#">logan</a></span>
                                                        <span class="time"><a href="#">blockbuster</a></span>
                                                        <span class="time"><a href="#">final battle</a></span>
                                                    </p>
                                                </div> --}}
                                                <div class="ads">
                                                    <img src="images/uploads/ads1.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="filmography" class="tab" style="display: none;">
                                        <div class="row">
                                            <div class="rv-hd">
                                                <div>
                                                    <h3>Biography of</h3>
                                                    <h2>{{ $celebrity->name }}</h2>
                                                </div>

                                            </div>
                                            <div class="topbar-filter">
                                                <p>Found <span>{{ count($fullMovies) }} movies</span> in total</p>
                                                {{-- <label>Filter by:</label>
                                                <select>
                                                    <option value="popularity">Popularity Descending</option>
                                                    <option value="popularity">Popularity Ascending</option>
                                                    <option value="rating">Rating Descending</option>
                                                    <option value="rating">Rating Ascending</option>
                                                    <option value="date">Release date Descending</option>
                                                    <option value="date">Release date Ascending</option>
                                                </select> --}}
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                @foreach ($fullMovies as $item)
                                                
                                                    <div class="cast-it">
                                                        <div class="cast-left cebleb-film">
                                                            <img width="50px" src="{{ Storage::url($item->movie->thumbnail) }}" alt="">
                                                            <div>
                                                                <a href="{{ route('movie.view',$item->movie->slug) }}">{{ $item->movie->title }}</a>
                                                            </div>

                                                        </div>
                                                        <p>... {{ Str::substr($item->movie->release_date, 0, 4) }}</p>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
