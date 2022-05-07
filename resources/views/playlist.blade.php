@extends('layouts.app')

@section('content')
    <div class="container-fluid playlist-page">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
                {{-- <h1 class="text-salmon">Welcome to my Spotify</h1> --}}
                @if($data)
                    <div class="playlist-desc mb-3">
                        <h4 class="mb-3">{{ isset($data->name) ? $data->name : 'Playlist' }}</h4>
                        <img class="playlist-img" src="{{ $data->images[0]->url }}" alt="">
                    </div>
                @endif
                @if ($data->tracks->items)
                    <table class="table table-striped table-hover table-dark w-100">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                {{-- <th scope="col">Image</th> --}}
                                <th scope="col">Title</th>
                                <th scope="col">Artist</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->tracks->items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</th>
                                    {{-- <td><img src="{{ $item->track->album->images[2]->url }}" alt=""></td> --}}
                                    <td>{{ $item->track->album->name }}</td>
                                    <td>{{ $item->track->album->artists[0]->name }}</td>
                                    <td><button type="button" class="btn btn-light play-song"
                                            data-id="{{ $item->track->id }}">Play</button></td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr> --}}
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('pagejs')
    {{-- <script src="{{ asset('js/pages/home/index.js') }}" defer></script> --}}
@stop
