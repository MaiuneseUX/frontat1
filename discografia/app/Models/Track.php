<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = ['title', 'duration', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}