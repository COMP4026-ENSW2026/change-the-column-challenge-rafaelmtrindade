<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::camel($value);
    }

    public function getNameAttribute($value)
    {
        return Str::kebab($value);
    }

}
