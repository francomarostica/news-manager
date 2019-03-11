<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function __construct($name="", $description=""){
        $this->name = $name;
        $this->description = $description;
    }

    public function users(){
        return $this->belongsToMany('\App\User');
    }
}
