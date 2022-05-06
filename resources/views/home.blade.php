@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-salmon">Welcome to my Spotify</h1>
            <h4>Most Played Songs</h4>

            @if(isset($data))
            <div class="row">
                @foreach ($data->items as $item)
                    {{-- <p>{{ $item->album->name }}</p> --}}
                    <div class="col-md-3">
                        <div class="card mb-3">
                          
                            {{-- <div class="card-header">
                              
                            </div> --}}
                            <img class="card-img-top" src="{{ $item->album->images[0]->url }}" alt="Card image cap">
                            <div class="card-body">
                                
                              <h5 class="card-title">  {{ $item->name }}</h5>
                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                              <a href="javascript:void(0)" id="play-song" data-id="{{ $item->id }}" class="btn btn-primary">Play</a>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>
            @endif
            {{-- <img id="current-track"/>
            <h3 id="current-track-name"></h3> --}}
            {{-- <a class="btn btn-salmon btn-lg" href="https://glitch.com/edit/#!/spotify-web-playback">Get started!</a> --}}
            {{-- <a class="btn" href="javascript:void(0)" id="play-song">play</a> --}}
        </div>
    </div>
</div>
@endsection

@section('pagejs')
    <script src="{{ asset('js/pages/home/index.js') }}" defer></script>
@stop
