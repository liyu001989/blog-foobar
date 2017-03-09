@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">帖子列表</div>
                <div class="panel-body">
                    @foreach($posts as $post)
                        <div>title: {{ $post->title }}</div>
                        <div>content: {{ $post->content }}</div>
                        <div>user: {{ $post->user->name }}</div>
                        <div>分类: {{ $post->tag->name }}</div>
                        <div>头像:
                            @if ($post->user->avatar)
                                <img width="50px" height="50px" src="{{ $post->user->avatar }}">
                            @endif
                        </div>

                        <a href="{{ route('posts.show', $post->id) }}" class="pull-right">查看</a>
                        <hr>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection