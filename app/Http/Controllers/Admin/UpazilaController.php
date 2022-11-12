<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function upazilasList()
    {
        $upazilas= Upazila::with('district')->paginate(10);
        return $upazilas;
    }
}
