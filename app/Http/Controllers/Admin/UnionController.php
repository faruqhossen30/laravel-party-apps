<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function unionsList()
    {
        $unions=Union::with('upazila')->paginate(10);
        return $unions;
    }
}
