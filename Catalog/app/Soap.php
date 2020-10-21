<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soap extends BaseProductable
{
    protected $table = 'soap';

    protected $casts = [
        'is_antibacterial' => 'boolean'
    ];

}
