<?php

namespace lara\pts;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $fillable = ['post_id', 'name', 'email', 'content'];

    public function post() {
        return $this->belongsTo("lara\pts\Post");
    }

}
