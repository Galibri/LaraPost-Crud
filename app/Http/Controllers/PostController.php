<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:5',
            'category_id' => 'required'
        ]);

        $bsd_slug = Str::slug($request->title);
        $bsd_next = 2;
        while(Post::whereSlug($bsd_slug)->first()) {
            $bsd_slug = Str::slug($request->title) . '-' . $bsd_next;
            $bsd_next++;
        }

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $bsd_slug;
        $post->category_id = $request->category_id;
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post Published Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        return view('backend.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required|min:5',
            'category_id' => 'required'
        ]);

        $bsd_slug = Str::slug($request->title);
        $bsd_next = 2;
        while(Post::whereSlug($bsd_slug)->first()) {
            if($post->title == $request->title) {
                break;
            }
            $bsd_slug = Str::slug($request->title) . '-' . $bsd_next;
            $bsd_next++;
        }

        $post->title = $request->title;
        $post->slug = $bsd_slug;
        $post->category_id = $request->category_id;
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post Deleted Successfully');
    }
}
