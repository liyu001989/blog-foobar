<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate();

        return view('post.index', compact('posts'));
    }

    public function show($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $user = $request->user();

        $comments = $post->comments;

        return view('post.show', compact('post', 'user', 'comments'));
    }

    public function edit($id, Request $request)
    {
        $post = Post::findOrFail($id);

        if ($request->user()->id != $post->user_id) {
            abort('403', '您无权修改');
        }
        $tags = Tag::all();

        return view('post.edit', compact('post', 'tags'));
    }

    public function update($id, Request $request)
    {
        $post = Post::findOrFail($id);

        if ($request->user()->id != $post->user_id) {
            abort('403', '您无权修改');
        }

        $attribtes = $request->only('title', 'content', 'tag_id');
        $post->update($attribtes);

        return redirect(route('posts.show', $post->id));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('post.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->tag_id = $request->get('tag_id');
        $post->user()->associate($user);
        $post->save();

        return redirect(route('posts.index'));
    }

    public function destroy($id, Request $request)
    {
        $post = Post::findOrFail($id);

        if ($request->user()->id != $post->user_id) {
            abort('403', '您无权删除');
        }

        $post->delete();

        return redirect(route('posts.index'));
    }
}
