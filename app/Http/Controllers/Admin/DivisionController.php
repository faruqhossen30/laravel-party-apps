<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function divisionsList(){
        $divisions= Division::paginate();
        return $divisions;
    }
}
