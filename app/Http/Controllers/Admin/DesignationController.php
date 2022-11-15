<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation=Designation::paginate();
        return $designation;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "just for test";
        $request->validate([
            'title'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'status'=>$request->status,
            'user_id'=>$request->user_id,
        ];

        $data=Designation::create( $data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->method();
        // return $request->all();
        $request->validate([
            'title'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'status'=>$request->status,
            'user_id'=>$request->user_id,
        ];

        $data=Designation::where('id',$id)->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $designation=Designation::where('id',$id)->first()->delete();
        return response()->json($designation);
    }
}
