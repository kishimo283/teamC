@extends('layout.app')

@section('title','HOME画面')

@section('content')
    <div class="main">
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
                        <button type="submit">削除</button>
                    </form>
                </a>
            </div>
        @endforeach
            <div class="new-event">
                <p><a href="create">新規作成</a></p>
            </div>
    </div>
@endsection