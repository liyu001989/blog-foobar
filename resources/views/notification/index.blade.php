@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">通知</div>
                <div class="panel-body">
                 @foreach($notifications as $notification)
                    <div>帖子: {{ $notification->post->id }}</div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection