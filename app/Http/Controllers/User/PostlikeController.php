<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post\PostLike;
use Illuminate\Http\Request;

class PostlikeController extends Controller
{
    public function postLike(Request $request, $id)
    {

        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ];

        $likecheck = PostLike::where('user_id', $request->user_id)->first();
        // return $likecheck;
        if ($likecheck) {
            $likecheck->delete();
            return "now delete";
        } else {
            $like = PostLike::create($data);
            return response()->json($like);
        }
    }
}
