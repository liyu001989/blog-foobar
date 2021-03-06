@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">帖子修改</div>
                <div class="panel-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div>title: <input required type="text" name="title" value="{{ $post->title }}"></div>
                        <div>content: <textarea required name="content">{{ $post->content }}</textarea></div>
                        <div>
                            <select name="tag_id">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" @if($post->tag->id == $tag->id) selected @endif>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection