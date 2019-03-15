<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function category_id(){
        return $this->belongsToMany(Category::class);
    }
}
