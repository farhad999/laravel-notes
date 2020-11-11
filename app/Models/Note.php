<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    function tags(){
        return $this->belongsToMany(Tag::class, 'note_tags', 'note_id', 'tag_id');
    }

    function images(){
        return $this->hasMany(NoteImage::class, 'note_id');
    }

}
