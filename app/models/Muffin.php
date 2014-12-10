<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Muffin extends Eloquent
{

    public $fillable = [
        "title",
        "description",
        "directions",
        "image",
        "calories",
    ];

}

