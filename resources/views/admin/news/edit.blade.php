@extends('layouts.admin')

@section('content')
<h1>Редагувати новину</h1>
<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $news->title }}">
    <textarea name="content">{{ $news->content }}</textarea>
    <input type="file" name="image">
    <button type="submit">Оновити</button>
</form>
@endsection
