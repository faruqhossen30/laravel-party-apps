<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post\PostLike;
use Illuminate\Http\Request;

class PostlikeController extends Controller
{
    public function postLike(Request $request)
    {

        $request->validate([
            'post_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
        ];

        $likecheck = PostLike::where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
        // return $likecheck;
        if ($likecheck) {
            $likecheck->delete();

            $likes = PostLike::where('post_id', $request->post_id)->count();
            return response()->json($likes);
        } else {
            $like = PostLike::create($data);
            $likes = PostLike::where('post_id', $request->post_id)->count();
            return response()->json($likes);
        }
    }
}
