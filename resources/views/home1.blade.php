@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(isset($data))
            <div class="row">
                @foreach ($data->items as $video)
                <div class="col-md-12">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <a href="{{ route('watch', ['id' => $video->id->videoId]) }}">
                                <img class="img-thumbnail" height="{{ $video->snippet->thumbnails->medium->height }}" width="{{ $video->snippet->thumbnails->medium->width }}" src="{{ $video->snippet->thumbnails->medium->url }}" alt="Card image">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h4 class="card-title">{{ $video->snippet->title }}</h4>
                                <p class="card-text">{{ Str::words($video->snippet->description, 8, ' ...') }}</p>
                                <a href="#" class="btn btn-primary">Save to Playlist</a>
                              </div>
                        </div>
                    </div>
                    {{-- <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{ $video->snippet->thumbnails->default->url }}" alt="Card image">
                    </div> --}}
                </div>
                    {{-- <p>{{ $video->id->videoId }}</p> --}}
                    {{-- <p>{{ $video->snippet->title }}</p> --}}
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
