<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserprofileController extends Controller
{
    public function index()
    {
        $user = User::paginate();
        return $user;
    }

    public function update(Request $request, $id)
    {

        // return $request->all();

        $thumbnail = null;
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('uploads/photos/user_profile/' . $name_gen);
            $save_url = 'uploads/photos/user_profile/' . $name_gen;
        }
        $data = [
            'avatar' => $save_url,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'is_admin' => $request->is_admin,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'relation_status' => $request->relation_status,
            'blood' => $request->blood,
            'website' => $request->website,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
        ];

        $updateProfile = User::where('id', $id)->first()->update($data);
        return response()->json($updateProfile);
    }
}
