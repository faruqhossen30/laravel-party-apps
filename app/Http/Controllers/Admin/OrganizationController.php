<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations=Organization::paginate();
        return $organizations;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'bn_name'=>'required',
            'description'=>'required',
        ]);

        $data=[
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
            'description'=>$request->description,
        ];

        $data=Organization::create( $data);
        return response()->json($data);

    }

    function update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'bn_name'=>'required',
            'description'=>'required',
        ]);
        $data=[
            'name'=>$request->name,
            'bn_name'=>$request->bn_name,
            'description'=>$request->description,
        ];

        $organization = Organization::where('id', $id)->first()->update($data);

        return response()->json($organization);
    }

    public function destroy($id)
    {
        $organization = Organization::where('id', $id)->first()->delete();
        return response()->json($organization);
    }

}
