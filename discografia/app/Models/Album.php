<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'release_year'];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}
