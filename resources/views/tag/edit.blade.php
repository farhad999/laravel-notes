@extends('layouts.app')

@section('main')
<div class="container">
    {!!Form::open(['url' => action([App\Http\Controllers\TagController::class, 'update'], $tag->id), 'method' => 'PUT'])!!}
        <div class="mb-3">
            <label class="form-label">Tag Name</label>
            <input type="text" name="name" value={{$tag->name}}
            class="form-control" placeholder="Tag Name">
            @error('name')
                <div class='text-danger'>{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <button type='submit' class="btn btn-primary">Update</button>
          </div>
          {!!Form::close()!!}
</div>
@endsection
