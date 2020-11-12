<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\NoteImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NoteController extends Controller
{
    function index()
    {

       // dd(\request()->input('tag'));

        if(\request()->filled('tag')){
            $notes = Note::whereHas('tags', function($query){
                $query->where('tags.id', '=', \request()->input('tag'));
            })->get();
        }else{
            $notes = Note::with('tags')->get();
        }

        $tags = Tag::select('id', 'name')->get();

        return view("note.index", compact('notes', 'tags'));
    }

    function create()
    {

        $tags = Tag::pluck('name', 'id')->toArray();

        return view('note.create')->with(['tags' => $tags]);
    }

    function store()
    {

        \request()->validate([
            'title' => 'required|string',
            'body' => 'string',
            'tags' => 'array',
            'images.*' => 'mimes:jpg,png,jpeg|max:20000'
        ]);

        $tags = \request()->input('tags');
        $title = \request()->input('title');
        $body = \request()->input('body');
        $count = 1;

        try {
            $note = new Note();
            $note->title = $title;
            $note->body = $body;

            $note->save();

            $note->tags()->attach($tags);


            if(\request()->hasFile('images')) {

                $images = \request()->file('images');

                foreach ($images as $image) {
                    echo $image;
                    $name = time() . '_' . $count . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);

                    //now save image in database

                    $noteImage = new NoteImage();
                    $noteImage->image = $name;
                    $noteImage->note()->associate($note);
                    $noteImage->save();
                    $count++;

                }

            }

            session()->flash('message', 'Note saved Successfully');

            return redirect('/');


        } catch (\Exception $exception) {
            Log::emergency('Message: ' . $exception->getMessage() . ' File ' . $exception->getFile());
            return dd($exception);
        }

        dd(\request()->all());
    }

    function show($id){

        $note = Note::find($id);

        return view('note.view', compact('note'));
    }

}
