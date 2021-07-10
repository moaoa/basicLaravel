<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public $timestamps = false;
    // accessors
    // this will get the name attribute as value variable
    public function getNameAttribute($value){
        // return ucFirst($value);
        return "*** " . $value;
    }

    // mutator
    public function setNameAttribute($value){
        $this->attributes['name'] = 'MR ' . $value;
    }
}
