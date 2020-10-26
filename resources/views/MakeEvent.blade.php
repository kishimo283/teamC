@extends('layout.app')

@section('title','HOME画面')

@section('content')
    @foreach($events as $event)
            <div class="event">
                <p>{{ $event->title }}</p>
                <p>{{ $event->start_date }}</p>
                <p>{{ $event->start_time }}</p>
            </div>
    @endforeach
    <div class="new-event">
        <p><a href="create">新規作成</a></p>
    </div>
@endsection