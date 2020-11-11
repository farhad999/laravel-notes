@extends('layouts.app')

@section('main')
    <div class="container">
        <h4 class="text-center my-2">Create</h4>
        <div>

            {!! Form::open(['url' => action([\App\Http\Controllers\NoteController::class, 'store']), 'files' => true]) !!}
            <div class="form-group my-1">
                {!! Form::label('title', 'Note Title', ['class'=>'form-label']) !!}
                {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!}

                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror

            </div>
            <div class="form-group my-1">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', '', ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
            <div class="form-group my-1">
                {!! Form::label('images', 'Images') !!}
                {!! Form::file('images[]', ['class' => 'form-control', 'multiple'=>true]) !!}
            </div>

            <div class="form-group my-1">
                {!! Form::label('tags', 'Select Tags') !!}
                {!! Form::select('tags[]', $tags, null, ['class' => 'js-example-basic-multiple w-100', 'multiple' => true]) !!}

            </div>

            <button class="mt-1 btn btn-primary" type="submit">Save</button>
            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
