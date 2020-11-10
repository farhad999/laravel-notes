@extends('layouts.app')

@section('main')
<div class="container">
    <form method="post" action='{{route('tags.store')}}'>
        @csrf
        <div class="mb-3">
            <label class="form-label">Tag Name</label>
            <input type="text" name="name" class="form-control" placeholder="Tag Name">
            @error('name')
                <div class='text-danger'>{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <button type='submit' class="btn btn-primary">Create</button>
          </div>
    </form>
</div>
@endsection
