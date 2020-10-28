@extends('layout.app')

@section('title','新規作成')

@section('content')
<form method="POST" action="{{ route('store') }}">
    @csrf
    <label for="title">イベント名：</label>
    <input id="title" name="title" type="text" class="form-control" value="{{ old('title') }}">
    <br>
    <label for="start_date">開催時間：</label>
    <input id="start_date" name="start_date" type="date" value="{{ old('start_date') }}">
    <br>
    <label for="start_time">開催時間：</label>
    <input id="start_time" name="start_time" type="time" value="{{ old('start_time') }}">
    <br>
    <button type="submit" class="btn">作成する</button>
</form>
@endsection