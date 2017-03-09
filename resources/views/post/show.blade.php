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

                    @if ($user && $user->id == $post->user_id)
                    <div class="pull-right">
                        <a href="{{ route('posts.edit', $post->id) }}" >修改</a> |
                        <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" >删除</a>
                    </div>
                    @endif
                    <hr>
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