@extends('layouts.master')
@section('content')
    <div class="hero common-hero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="hero-ct">
                        <h1>celebrity listing - list</h1>
                        <ul class="breadcumb">
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li> <span class="ion-ios-arrow-right"></span> celebrity listing</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-single">
        <div class="container">
            <div class="row ipad-width2">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="topbar-filter">
                        <p class="pad-change">Found <span>{{ count($celebrities) }} celebrities</span> in total</p>
                        {{-- <label>Sort by:</label> --}}
                        {{-- <select>
                            <option value="popularity">Popularity Descending</option>
                            <option value="popularity">Popularity Ascending</option>
                            <option value="rating">Rating Descending</option>
                            <option value="rating">Rating Ascending</option>
                            <option value="date">Release date Descending</option>
                            <option value="date">Release date Ascending</option>
                        </select>
                        <a href="celebritylist.html" class="list"><i class="ion-ios-list-outline active"></i></a>
                        <a href="celebritygrid01.html" class="grid"><i class="ion-grid "></i></a> --}}
                    </div>
                    <div class="row">
                        @foreach ($celebrities as $item)
                            <div class="col-md-12">
                                <div class="ceb-item-style-2">
                                    <img src="{{ Storage::url($item->image) }}" alt="">
                                    <div class="ceb-infor">
                                        <h2><a href="{{ route('celebrity.view',$item->slug) }}">{{ $item->name }}</a></h2>
                                        <span>{{ $item->country }}</span>
                                        <p>{{ $item->introduce }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="topbar-filter">
                        <label>Results per page:</label>
                        <select>
                            <option value="range">6 result</option>
                        </select>

                        <div class="pagination2">
                            {{ $celebrities->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 col-sm-12">
                    <div class="sidebar">
                        <div class="searh-form">
                            <h4 class="sb-title">Search celebrity</h4>
                            <form class="form-style-1 celebrity-form" method="POST" action="{{ route('celebrity.search') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 form-it">
                                        <label>Celebrity name</label>
                                        <input type="text" name="name" placeholder="Enter keywords">
                                    </div>
                                    
                                    {{-- <div class="col-md-12 form-it">
                                        <label>Year of birth</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select>
                                                    <option value="range">1970</option>
                                                    <option value="number">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12 ">
                                        <input class="submit" type="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ads">
                            <img src="images/uploads/ads1.png" alt="">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
