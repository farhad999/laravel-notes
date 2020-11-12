@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between my-2">
            <h5>Notes</h5>
            <a href="/notes/create" class="btn btn-primary">Create</a>
        </div>

        <div class="row">
            @foreach($notes as $note)
                <div class="col-md-3 col-sm-6">

                    <a href="/notes/{{$note->id}}">
                        <div class="card note-card view-note">
                            <div class="card-body">
                                <h5>{{substr($note->title, 0, 50)}}</h5>
                                <div>{{substr($note->body, 0, 100)}}</div>
                            </div>
                            @if(count($note->tags)> 0)
                                <div class="card-footer d-flex">
                                    @foreach($note->tags as $tag)
                                        <button class="mx-1 btn btn-primary">{{$tag->name}}</button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach()
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            /*$(document).on('click', '.view-note', function () {

                let href = $(this).attr('data-href');
                console.log("clicked", href);
                $('.view-note-modal').val(href);
                $('.view-note-modal').modal('show');
            });*/

            $(document).on('click', '.view-note', function () {
                console.log('dd');
                $('div.view-note-modal').load($(this).data('href'), function () {
                    /*$(this).modal('show');*/
                    alert('loaded')
                })
            })

        })
    </script>

@endsection
