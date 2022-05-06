@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <iframe width="420" height="315" src="https://www.youtube.com//embed/{{ $video_id }}" allowfullscreen>
            </iframe>
        </div>
    </div>
</div>
@endsection

@section('pagejs')
    {{-- <script src="{{ asset('js/pages/home/index.js') }}" defer></script> --}}
@stop
