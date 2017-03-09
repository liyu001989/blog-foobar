@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">用户信息</div>
                <div class="panel-body">
                    <div>name: {{ $user->name }}</div>
                    <div>email {{ $user->email }}</div>
                    <div>touxiang: <img src="{{ $user->avatar }}"></div>
                    <form action="{{ route('user.avatar') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="avatar">
                        <button type="submit">修改头像</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection