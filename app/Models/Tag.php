<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    function notes(){
        return $this->belongsToMany(Tag::class, 'note_tags', 'tag_id', 'note_id');
    }
}
