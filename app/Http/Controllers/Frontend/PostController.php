<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Post\PostImage;
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
        $posts = Post::with('user', 'photo')->withCount('likes')->latest()->paginate(10);
        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            // 'user_id' => 'required',
            'body' => 'required'
        ]);

        $data = [
            'user_id' => 2,
            'body' => $request->body
        ];

        $thumbnail = null;
        if ($request->hasFile('file')) {
            $imagethumbnail = $request->file('file');
            $extension = $imagethumbnail->getClientOriginalExtension();
            $thumbnail = Str::uuid() . '.' . $extension;
            Image::make($imagethumbnail)->save('uploads/photos/post/' . $thumbnail);
        }

        // if($request->has('file')){
        //     foreach ($request->file('file') as $photo) {
        //         $imagethumbnail = $photo;
        //         $extension = $imagethumbnail->getClientOriginalExtension();
        //         $thumbnail = Str::uuid() . '.' . $extension;
        //         Image::make($imagethumbnail)->save('uploads/photos/post/' . $thumbnail);
        //     }

        // }



        $post = Post::create($data);
        if($thumbnail){
            PostImage::create([
                'post_id'=> $post->id,
                'name'=> $thumbnail
            ]);
        };

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
