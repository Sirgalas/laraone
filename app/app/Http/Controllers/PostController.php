<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Post $post)
    {
        return view('posts.index',['posts'=>$post->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('post.create');
    }

    /**
     * @param Request $request
     * @param Post $posts
     */
    public function store(Request $request,Post $posts)
    {
        $posts->title=$request->title;
        $posts->slug=Str::slug($request->title);
        $posts->description=$request->description;
        $posts->save();
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view ('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $posts)
    {
        $posts->title=$request->title;
        $posts->slug=Str::slug($request->title);
        $posts->description=$request->description;
        $posts->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
