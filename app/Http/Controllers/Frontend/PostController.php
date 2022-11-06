<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'some';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request->all();
        $request->validate([
            'user_id'=> 'required',
            'body'=> 'required'
        ]);

        $data = [
            'user_id'=> $request->user_id,
            'body'=> $request->body
        ];

        $thumbnail = null;
        if ($request->file('file')) {
            $imagethumbnail = $request->file('file');
            $extension = $imagethumbnail->getClientOriginalExtension();
            $thumbnail = Str::uuid() . '.' . $extension;
            Image::make($imagethumbnail)->save('uploads/photos/' . $thumbnail);
        }


        $post = Post::create($data);

        return response()->json($post);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
