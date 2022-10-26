<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminlistController extends Controller
{
    public function adminList()
    {
        $users= User::paginate(10);
        return $users;
    }
}
