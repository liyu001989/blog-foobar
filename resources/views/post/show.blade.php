@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">帖子列表</div>
                <div class="panel-body">
                    <div>title: {{ $post->title }}</div>
                    <div>content: {{ $post->content }}</div>
                    <div>user {{ $post->user->id }}</div>
                    <div>分类: {{ $post->tag->name }}</div>
                    <div>时间: {{ $post->created_at }}</div>

                    @if ($user && $user->id == $post->user_id)
                    <div class="pull-right">
                        <a href="{{ route('posts.edit', $post->id) }}" >修改</a> |
                        <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" >删除</a>
                    </div>
                    @endif
                    <hr>

                    @if (!Auth::guest())
                    <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                        {{ csrf_field() }}
                        <textarea name="content"></textarea>
                        <button type="submit">评论</button>
                    </form>
                    @endif

                    <hr>
                    <div>
                        @foreach($comments as $comment)
                            <div>用户：{{ $comment->user->name }}</div>
                            <div>评论：{{ $comment->content }}</div>
                            <div class="pull-right">{{ $comment->created_at }}</div>

                            @if ($user && $user->id == $comment->user_id)
                                <a onclick="event.preventDefault();document.getElementById('comment-delete-form').submit();">删除</a>
                            @endif
                            <hr>

                            <form id="comment-delete-form" action="{{ route('posts.comments.destroy', [$post->id, $comment->id]) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="delete-form" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>


@endsection
