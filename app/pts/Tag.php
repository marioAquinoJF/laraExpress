<?php

namespace lara\pts;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public function tags() {
        return $this->belongsToMany("lara\pts\Post",'posts_tags');
    }
}
