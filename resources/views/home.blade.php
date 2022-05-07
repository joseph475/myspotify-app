@extends('layouts.app')

@section('content')
    <div class="container-fluid home-page">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                {{-- <h1 class="text-salmon">Welcome to my Spotify</h1> --}}
                <h4 class="mb-3">Most Played Songs</h4>

                @if (isset($userTopTracks))
                    <div class="row">
                        @foreach ($userTopTracks->items as $item)
                            {{-- <p>{{ $item->album->name }}</p> --}}
                            <div class="col-md-4">
                                <div class="card mb-3 top-track-card play-song" data-id="{{ $item->id }}">
                                    <div class="card-content d-flex align-items-center">
                                        <div class="card-imgs w-25 position-relative">
                                            <div id="overlay"></div>
                                            <img class="img-fluid rounded-left" src="{{ $item->album->images[0]->url }}"
                                                alt="Card image cap">
                                        </div>
                                        <div class="card-details p-4 d-flex justify-content-between align-items-center"
                                            style="flex-grow: 1">
                                            <h5 class="card-title mb-0"> {{ $item->name }}</h5>
                                            <i data-id="{{ $item->id }}"
                                                class="fa-solid fa-circle-play btn-play-1 play-song"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Featured Playlist --}}
            <div class="col-md-12 mb-3">
                @if ($categoryToplist)
                    <h4 class="mb-3">Featured Playlist</h4>
                    <div class="row">
                        @foreach ($categoryToplist->playlists->items as $item)
                            <div class="col-md-2">
                                <div class="card mb-3 card-2" data-id="{{ $item->id }}">
                                    <img class="card-img-top" src="{{ $item->images[0]->url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::words($item->description, 8) }}</p>
                                        <i data-id="{{ $item->id }}" class="fa-solid fa-circle-play btn-play-2"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>


            {{-- OPM Playlist --}}
            <div class="col-md-12 mb-3">
                @if ($categoryChill)
                    <h4 class="mb-3">Chill</h4>
                    <div class="row">
                        @foreach ($categoryChill->playlists->items as $item)
                            <div class="col-md-2">
                                <div class="card mb-3 card-2" data-id="{{ $item->id }}">
                                    <img class="card-img-top" src="{{ $item->images[0]->url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::words($item->description, 8) }}</p>
                                        <i data-id="{{ $item->id }}" class="fa-solid fa-circle-play btn-play-2"></i>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

             {{-- Mood Playlist --}}
             <div class="col-md-12 mb-3">
                @if ($categoryMood)
                    <h4 class="mb-3">Chill</h4>
                    <div class="row">
                        @foreach ($categoryMood->playlists->items as $item)
                            <div class="col-md-2">
                                <div class="card mb-3 card-2" data-id="{{ $item->id }}">
                                    <img class="card-img-top" src="{{ $item->images[0]->url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::words($item->description, 8) }}</p>
                                        <i data-id="{{ $item->id }}" class="fa-solid fa-circle-play btn-play-2"></i>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            
            {{-- OPM Playlist --}}
            <div class="col-md-12 mb-3">
                @if ($categoryOpm)
                    <h4 class="mb-3">OPM</h4>
                    <div class="row">
                        @foreach ($categoryOpm->playlists->items as $item)
                            <div class="col-md-2">
                                <div class="card mb-3 card-2" data-id="{{ $item->id }}">
                                    <img class="card-img-top" src="{{ $item->images[0]->url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p class="card-text">{{ Str::words($item->description, 8) }}</p>
                                        <i data-id="{{ $item->id }}" class="fa-solid fa-circle-play btn-play-2"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    <script src="{{ asset('js/pages/home/index.js') }}" defer></script>
@stop
