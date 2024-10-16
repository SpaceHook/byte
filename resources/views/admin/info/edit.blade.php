@extends('layouts.admin')

@section('content')
<h1>Редагувати інформацію</h1>
<form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Заголовок</label>
    <input type="text" name="title" value="{{ $info->title }}" required>

    <label>Зображення (оновіть, якщо потрібно)</label>
    <input type="file" name="image">
    @if ($info->image)
    <p>Поточне зображення:</p>
    <img src="{{ asset('storage/' . $info->image) }}" alt="Зображення інформації" width="100">
    @endif

    <button type="submit">Оновити інформацію</button>
</form>
@endsection
