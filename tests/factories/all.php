<?php

use League\FactoryMuffin\Facade as FactoryMuffin;

FactoryMuffin::define(
    'Muffin', [
        'title'       => 'realText',
        'description' => 'sentence|3',
        'directions'  => 'paragraph|2',
        'image'       => 'imageUrl|400;400;food',
        'calories'    => 'numberBetween|100;1500'
    ]
);