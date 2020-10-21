<?php

namespace App\Http\Controllers;

use App\Fragrance;
use App\Http\Resources\FragranceResource;
use Illuminate\Http\Request;

class FragranceController extends Controller
{
    public function index()
    {
        return FragranceResource::collection(Fragrance::all());
    }
}
