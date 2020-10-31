@extends('layout.app')

@section('title','HOME画面')

@section('content')

    <div class="main">
        @if(Auth::check())
            <p>ユーザー名：　{{ $user->name }}</p>
            <p><a href ="/home">ログアウト</a></p>
        @else
            <p>※ログインしていません（<a href="/login">ログイン</a>｜<a href="/register">登録</a>）</p>
        @endif

        @foreach($events as $event)
            <div class="event">
                <a href="/attend/{{ $event->id }}">
                    <ul>
                        <li>{{ $event->title }}</li>
                        <li>{{ $event->start_date }}</li>
                        <li>{{ substr($event->start_time, 0, 5) }}</li>
                    </ul>
                    <form method="post" action="{{ route('delete',$event->id) }}">
                        @csrf
                        <button type="submit" onclick="return confirm('イベントを削除してもよろしいですか')">削除</button>
                    </form>
                </a>
            </div>
        @endforeach
        <div class="new-event">
            <p><a href="create">新規作成</a></p>
        </div>
    </div>
@endsection