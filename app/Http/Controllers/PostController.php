<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::with('user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:png,jpg,jpeg,svg']
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-post', 'public');
        }

        Post::create($validatedData);
        return redirect()->route('posts.index')->with('success', "Post Created Success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.view', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact(['post']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'max:2048', 'mimes:png,jpg,jpeg,svg']
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('image-post', 'public');
        } else {
            Storage::delete($post->image);
            $validatedData['image'] = $request->file('image')->store('image-post', 'public');
        }
        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', "post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'post deleted');
    }
}
