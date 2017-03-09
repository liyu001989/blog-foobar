@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">帖子列表</div>
                <div class="panel-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div><input name="title"></div>
                        <textarea name="content"></textarea>
                        <button type="submit">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection