@extends('layout.app')

@section('title','出欠確認画面')

@section('content')
<div class="attend-form">
    <form method="POST" action="{{ route('form') }}">
        @csrf
        <label for="student_name">名前</label>
        <input id="student_name" name="student_name" type="text"  value="{{ old('student_name') }}">
        <br>
        <label for="status">出席</label>
        <input id="status" name="status" type="radio" value="出席" checked="checked">
        <label for="status">欠席</label>
        <input id="status" name="status" type="radio" value="欠席">
        <br>
        <input id="event_id" name="event_id" type="hidden" value="{{ $event->id }}">
        <button type="submit" class="btn">登録する</button>
    </form>
</div>
<div clsss="attend-view">
    @foreach($students as $student)
        <p>{{ $student->student_name }}</p>
        <p>{{ $student->status }}</p>
        <form method="post" action="{{ route('cancel',$student->id) }}">
            @csrf
            <button type="submit" onclick="return confirm('出欠を取り消してよろしいですか')">取り消し</button>
        </form>
        <br>
    @endforeach
</div>
@endsection
