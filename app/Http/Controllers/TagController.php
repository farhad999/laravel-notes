<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    function index(){

        $tags = Tag::all();

        return view('tag.index')->with(['tags' => $tags]);
    }

    function create(){
        return view('tag.create');
    }
    function store(){

        \request()->validate([
            'name' => 'required'
        ]);

        try{
        $tag = new Tag();
        $tag->name = request()->input('name');
        $tag->save();
        \session()->flash('message', 'Tag created successfully');
        return redirect('/tags');
        }catch(\Excpetion $exception){
            throw $exception->getMessage();
        }
    }

    function edit($id){

        $tag = Tag::find($id);

        return view('tag.edit')->with(['tag' => $tag]);
    }

    function update($id){

        $tag = Tag::find($id);

        request()->validate([
            'name' => 'required'
        ]);

        $tag->name = \request()->input('name');

        $tag->save();

        session()->flash('message', 'Tag Updated');

        return redirect('/tags');

    }

    function destroy($id){

        $tag = Tag::findOrFail($id);

        if($tag){
            $tag->delete();
            session()->flash("message", "Tag Deleted");
            return redirect()->back();
        }

        return session()->flash('message', 'Unable to delete');

    }

}
