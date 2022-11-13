<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminlistController extends Controller
{
    public function adminList()
    {
        $users= User::paginate(10);
        return $users;
    }


    // designation
    // public function index(){
    //     $designation=Designation::paginate();
    //     return $designation;
    // }

    // store
    // public function store(Request $request){
    //     $request->validate([
    //         'title'=>'required',
    //     ]);

    //     $data=[
    //         'title'=>$request->title,
    //         'status'=>$request->status,
    //         'user_id'=>$request->user_id,
    //     ];

    //     $data=Designation::create( $data);
    //     return response()->json($data);
    // }

    // update
    // public function update(Request $request,$id){

    //     $data=[
    //         'title'=>$request->title,
    //         'status'=>$request->status,
    //         'user_id'=>$request->user_id,
    //     ];

    //     $data=Designation::where('id',$id)->first()->update($data);
    //     return response()->json($data);
    // }


    // destroy
    // public function destroy($id){
    //     $designation=Designation::where('id',$id)->first()->delete();
    //     return response()->json($designation);
    // }


}
