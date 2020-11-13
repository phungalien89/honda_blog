<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Post;

class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store()
    {
        $user = auth()->user();
        $data = request()->validate([
           'title' => ['required', 'max:255'],
           'description' => 'required',
           'price' => 'numeric',
            'image' => 'required | image',
        ]);
        $imgPath = request('image')->store('uploads/posts', 'public');
        $img = Image::make(public_path('/storage/' . $imgPath))->fit(1000, 1000);
        $img->save();
        $imgArr = ['image' => $imgPath];
        $user->posts()->create(array_merge($data, $imgArr));
        return redirect('/profile/'.$user->profile->id);
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('posts.show', compact('post'));
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update($post_id)
    {
        $post = Post::findOrFail($post_id);
        $currentImg = $post->image;
        $data = request()->validate([
           'title' => 'required | max:255',
           'price' => 'required | max:255',
           'description' => 'required',
           'image' => 'image | nullable',
        ]);
        $imgArr = ['image'];
        if(request('image')){
            $imgPath = request('image')->store('uploads/posts', 'public');
            $image = Image::make(public_path('/storage/'.$imgPath))->fit(1000, 1000);
            $image->save();
            $imgArr = ['image'=>$imgPath];
            Storage::delete('/public/'.$currentImg);
        }
        $post->update(array_merge($data, $imgArr));
        return redirect('/post/'.$post_id);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        $profile_id = $post->user->profile->id;
        $post_img = $post->image;
        $this->authorize('delete', $post);
        if(isset($_REQUEST['btnDelete'])){
            $post->delete();
            Storage::delete('/public/' . $post_img);
            return redirect('/profile/' . $profile_id);
        }
    }
}
