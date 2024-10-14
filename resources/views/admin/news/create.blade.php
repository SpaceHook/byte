@extends('layouts.admin')

@section('content')
<h1>Додати новину</h1>
<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Заголовок">
    <textarea name="content" placeholder="Контент"></textarea>
    <input type="file" name="image">
    <button type="submit">Зберегти</button>
</form>
@endsection
