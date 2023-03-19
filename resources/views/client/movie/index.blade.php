@extends('layouts.master')
@section('content')
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1> movie listing - grid</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="#">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> movie listing</li>
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
                    {{-- <div class="topbar-filter">
                        <p>Found <span>1,608 movies</span> in total</p>
                        <label>Sort by:</label>
                        <select>
                            <option value="popularity">Popularity Descending</option>
                            <option value="popularity">Popularity Ascending</option>
                            <option value="rating">Rating Descending</option>
                            <option value="rating">Rating Ascending</option>
                            <option value="date">Release date Descending</option>
                            <option value="date">Release date Ascending</option>
                        </select>
                        <a href="movielist.html" class="list"><i class="ion-ios-list-outline "></i></a>
                        <a href="moviegrid.html" class="grid"><i class="ion-grid active"></i></a>
                    </div> --}}
                    <div class="flex-wrap-movielist">
                        @foreach ($movies as $item)
                            <div class="movie-item-style-2 movie-item-style-1">
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="">
                                <div class="hvr-inner">
                                    <a href="{{ route('movie.view', $item->slug) }}"> Read more <i
                                            class="ion-android-arrow-dropright"></i> </a>
                                </div>
                                <div class="mv-item-infor">
                                    <h6><a href="{{ route('movie.view', $item->slug) }}">oblivion</a></h6>
                                    <p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    {{-- pagination --}}
                    <div class="topbar-filter">
                        <label>Movies per page:</label>
                        <select>
                            <option value="range">20 Movies</option>
                            <option value="saab">10 Movies</option>
                        </select>

                        <div class="pagination2">
                            <span>Page 1 of 2:</span>
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">...</a>
                            <a href="#">78</a>
                            <a href="#">79</a>
                            <a href="#"><i class="ion-arrow-right-b"></i></a>
                        </div>
                    </div>
                </div>

                {{-- SEARCH MOVIE --}}
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="searh-form">
                            <h4 class="sb-title">Search for movie</h4>
                            <form class="form-style-1" id="formSubmitSearch" action="{{ route('movie.search') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-it">
                                        <label>Movie name</label>
                                        <input type="text" name="movie_name" placeholder="Enter keywords">
                                    </div>
                                    <div class="col-md-12 form-it">
                                        <label>Genres &amp; Subgenres</label>
                                        <div class="group-ip">
                                            <div class="ui fluid dropdown selection multiple" tabindex="0">
                                                <select name="genres[]" multiple="">
                                                    <option value="">Enter to filter genres</option>
                                                    @foreach ($genres as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach

                                                </select><i class="dropdown icon"></i>
                                                <div class="default text">Enter to filter genres</div>
                                                <div class="menu" tabindex="-1">
                                                    @foreach ($genres as $item)
                                                        <div class="item" data-value="{{ $item->id }}">
                                                            {{ $item->name }}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 form-it">
                                        <label>Rating Range</label>
                                        <select>
                                            <option value="range">-- Select the rating range below --</option>
                                            <option value="saab">-- Select the rating range below --</option>
                                        </select>
                                    </div> --}}
                                    <div class="col-md-12 form-it">
                                        <label>Release Year</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select name="fromYear" id="fromYear">
                                                    <option value="no-data">From</option>
                                                    @foreach ($years as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="toYear" id="toYear">
                                                    <option value="no-data">To</option>
                                                    @foreach ($years as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <input class="submit" id="submitSearch" type="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="ads">
                            <img src="images/uploads/ads1.png" alt="">
                        </div>
                        <div class="sb-facebook sb-it">
                            <h4 class="sb-title">Find us on Facebook</h4>
                            <iframe
                                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhaintheme%2F%3Ffref%3Dts&amp;tabs=timeline&amp;width=340&amp;height=315px&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                                data-src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhaintheme%2F%3Ffref%3Dts&amp;tabs=timeline&amp;width=340&amp;height=315px&amp;small_header=true&amp;adapt_container_width=false&amp;hide_cover=false&amp;show_facepile=true&amp;appId"
                                height="315" style="width:100%;border:none;overflow:hidden"></iframe>
                        </div>
                        <div class="sb-twitter sb-it">
                            <h4 class="sb-title">Tweet to us</h4>
                            <div class="slick-tw slick-initialized slick-slider slick-dotted" role="toolbar">


                                <div aria-live="polite" class="slick-list draggable">
                                    <div class="slick-track"
                                        style="opacity: 1; width: 2080px; transform: translate3d(-520px, 0px, 0px);"
                                        role="listbox">
                                        <div class="tweet item slick-slide slick-cloned" tabindex="-1" role="option"
                                            aria-describedby="slick-slide01" style="width: 520px;" data-slick-index="-1"
                                            aria-hidden="true">
                                            <iframe id="" scrolling="no" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true"
                                                class="twitter-tweet twitter-tweet-rendered"
                                                style="position: absolute; visibility: hidden; display: block; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>
                                        </div>
                                        <div class="tweet item slick-slide slick-current slick-active"
                                            id="599202861751410688" tabindex="-1" role="option"
                                            aria-describedby="slick-slide00" style="width: 520px;" data-slick-index="0"
                                            aria-hidden="false">
                                            <iframe id="twitter-widget-0" scrolling="no" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true"
                                                class="twitter-tweet twitter-tweet-rendered"
                                                style="position: absolute; visibility: hidden; display: block; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>
                                        </div>
                                        <div class="tweet item slick-slide" id="297462728598122498" tabindex="-1"
                                            role="option" aria-describedby="slick-slide01" style="width: 520px;"
                                            data-slick-index="1" aria-hidden="true">
                                            <iframe id="twitter-widget-1" scrolling="no" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true"
                                                class="twitter-tweet twitter-tweet-rendered"
                                                style="position: absolute; visibility: hidden; display: block; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>
                                        </div>
                                        <div class="tweet item slick-slide slick-cloned" tabindex="-1" role="option"
                                            aria-describedby="slick-slide00" style="width: 520px;" data-slick-index="2"
                                            aria-hidden="true">
                                            <iframe id="" scrolling="no" frameborder="0"
                                                allowtransparency="true" allowfullscreen="true"
                                                class="twitter-tweet twitter-tweet-rendered"
                                                style="position: absolute; visibility: hidden; display: block; width: 0px; height: 0px; padding: 0px; border: none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <ul class="slick-dots" style="" role="tablist">
                                    <li class="slick-active" aria-hidden="false" role="presentation"
                                        aria-selected="true" aria-controls="navigation00" id="slick-slide00"><button
                                            type="button" data-role="none" role="button" tabindex="0">1</button>
                                    </li>
                                    <li aria-hidden="true" role="presentation" aria-selected="false"
                                        aria-controls="navigation01" id="slick-slide01"><button type="button"
                                            data-role="none" role="button" tabindex="0">2</button></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $("#formSubmitSearch").submit(function (e) {
            let fromYear = $("#fromYear").val();
            let toYear = $("#toYear").val();
            if (fromYear > toYear) {
                toastr.error('Năm bắt đầu không được lớn hơn năm kết thúc !');
                return;
            }
            // console.log('123');
            $("#formSubmitSearch").submit();
        });
    </script>
@endpush