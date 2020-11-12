@extends('layouts.app')

@section('main')
    <div class="container">

        <div class="mt-2 mb-4 text-center">
            <h4>Note Viewer</h4>
        </div>

        <div>
            <h5>{{$note->title}}</h5>
        </div>
        <div>
            {{$note->body}}
        </div>
    </div>
@endsection

