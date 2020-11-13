<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($profile_id)
    {
        $profile = Profile::findOrFail($profile_id);
        $user = User::findOrFail($profile->user_id);
        $this->authorize('view', $profile);
        return view('profile.index', compact('user'));
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->authorize('update', $user->profile);
        return view('profile.edit', compact('user'));
    }

    public function update()
    {
        $user = auth()->user();
        $currentImg = $user->profile->profileImage;
        $data = request()->validate([
           'title' => 'required | string | max:255',
           'description' => ['required', 'string'],
           'profileImage' => ['image', 'nullable'],
        ]);
        $arrImg = ['profileImage'];
        if(request('profileImage')){
            $imgPath = request('profileImage')->store('/uploads/profile', 'public');
            $img = Image::make(public_path('/storage/' . $imgPath))->fit(1000, 1000);
            $img->save();
            if(!strpos(strtolower($currentImg), "unavailable")){
                Storage::delete('/public/' . $currentImg);
            }
            $arrImg = ['profileImage' => $imgPath];
        }
        $user->profile->update(array_merge($data, $arrImg));
        return redirect('/profile');
    }
}
