@extends('layouts.app')

@section('main')
    <div class="container">

        @if(\session()->has('message'))
            <div class="alert alert-success">{{session()->get('message')}}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mt-2">
            <h5>Tags</h5>
            <a href="/tags/create" class="btn btn-primary">Create</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="/tags/{{$tag->id}}/edit" class="btn btn-primary small">Edit</a>
                            {!!Form::open(['url' => action([App\Http\Controllers\TagController::class, 'destroy'], $tag->id), 'method'=>"delete"])!!}
                            <button type="submit" class="btn btn-danger small">Delete</button>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
