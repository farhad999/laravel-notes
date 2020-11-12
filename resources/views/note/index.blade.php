@extends('layouts.app')

@section('main')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between my-2">
            <h5>Notes</h5>
            <a href="/notes/create" class="btn btn-primary">Create</a>
        </div>

        <div class="row">

            <div class="col-md-2">

                <ul class="nav nav-pills d-flex flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{(request()->is("/") && request('tag') == '') ? 'active' : ''}}" href="/">All Notes</a>
                    </li>
                    @foreach($tags as $tag)
                        <li class="nav-item">
                            <a class="nav-link {{request('tag') == $tag->id ? 'active' : ''}}" href="?tag={{$tag->id}}">{{$tag->name}}</a>
                        </li>
                    @endforeach
                </ul>


            </div>

            <div class="col-md-10">
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
