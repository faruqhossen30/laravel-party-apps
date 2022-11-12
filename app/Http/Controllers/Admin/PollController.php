<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
{
    function index(){
        $polls=Poll::paginate();
        return $polls;
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'status'=>$request->status,
            'user_id'=>$request->user_id,
        ];

        $data=Poll::create( $data);
        return response()->json($data);

    }

    function update(Request $request, $id){

        $request->validate([
            'title'=>'required',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        $data=[
            'title'=>$request->title,
            'status'=>$request->status,
            'user_id'=>$request->user_id,
        ];

        $organization = Poll::where('id', $id)->first()->update($data);

        return response()->json($organization);
    }


    public function destroy($id)
    {
        $poll = Poll::where('id', $id)->first()->delete();
        return response()->json($poll);
    }
}
