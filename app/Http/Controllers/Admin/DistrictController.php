<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function districtsList()
    {
        $districts= District::with('division')->paginate(10);
        return $districts;
    }
}
