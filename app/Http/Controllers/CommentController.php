<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Notification;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function store($postId, Request $request)
    {
        $post = Post::findOrFail($postId);
        $user = $request->user();

        $comment = new Comment;
        $comment->content = $request->get('content');
        $comment->user()->associate($user);
        $comment->post()->associate($post);
        $comment->save();

        $notification = new Notification;
        $notification->post_id = $post->id;
        $notification->user_id = $post->user->id;
        $notification->content = '有用户评论了您';
        $notification->save();

        return redirect(route('posts.show', $post->id));
    }

    public function destroy($postId, $id, Request $request)
    {
        $comment = Comment::findOrFail($id);

        if ($comment->user_id != $request->user()->id) {
            abort('403', '您无权删除');
        }

        $comment->delete();

        return redirect(route('posts.show', $postId));
    }
}
