<?php

namespace lara\pts;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['title', 'content'];

    public function comments() {
        return $this->hasMany("lara\pts\Comment");
    }
    public function tags() {
        return $this->belongsToMany("lara\pts\Tag",'posts_tags');
    }
    public function getTagListAttribute() {
       return implode(', ',$this->tags()->lists('name')->all());
    }
}

/*
comandos para o relacionamento, num objeto:
 * 
 * attach: cria o relacionamento; param, index or array.
 * detach: exclui o relacionamento; param, index or array.
 * sync: sincroniza o relacionamento por um vetor de indices; 
 *      - se o indice estiver no vetor e na db, ele permanece; 
 *      - se não estiver no vetor, mas estiver na db, ele é excluido do db;.
 *      - se estiver no vetor, mas não na db, ele é acrescentado à data base
 *  */
