<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follower(Request $request, $id){

        $request->validate([
            'user_id' => 'required',
            'follower_id' => 'required',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'follower_id' => $request->follower_id,
        ];

        $follow = Follower::where('user_id', $request->user_id)->first();
        // return $likecheck;
        if ($follow) {
            $follow->delete();
            return "follow delete";
        } else {
            $like = Follower::create($data);
            return response()->json($like);
        }


    }
}
