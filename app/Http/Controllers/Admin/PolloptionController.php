<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PollOption;
use Illuminate\Http\Request;

class PolloptionController extends Controller
{
    public function index(){
        $pollOptions=PollOption::paginate();
        return $pollOptions;
    }
    public function store(Request $request){
        $request->validate([
            'poll_id'=>'required',
            'user_id'=>'required',
            'option'=>'required',
            'count'=>'required',
        ]);

        $data=[
            'poll_id'=>$request->poll_id,
            'user_id'=>$request->user_id,
            'option'=>$request->option,
            'count'=>$request->count,
        ];

        $data=PollOption::create( $data);
        return response()->json($data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'poll_id'=>'required',
            'user_id'=>'required',
            'option'=>'required',
            'count'=>'required',
        ]);

        $data=[
            'poll_id'=>$request->poll_id,
            'user_id'=>$request->user_id,
            'option'=>$request->option,
            'count'=>$request->count,
        ];

        $data = PollOption::where('id', $id)->first()->update($data);
        return response()->json($data);
    }
    public function destroy($id)
    {
        $poll = PollOption::where('id', $id)->first()->delete();
        return response()->json($poll);
    }
}
