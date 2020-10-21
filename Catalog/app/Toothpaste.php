<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toothpaste extends BaseProductable
{
    protected $table = 'toothpaste';

    protected $casts = [
        'whitening_effect' => 'boolean',
    ];
}
