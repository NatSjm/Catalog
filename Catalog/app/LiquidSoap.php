<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiquidSoap extends BaseProductable
{
    protected $table = 'liquid_soap';

    protected $casts = [
        'is_antibacterial' => 'boolean',
        'contains_surfactants' => 'boolean',
    ];

}
