@extends('layouts.admin')

@section('content')
<h1>Редагувати курс</h1>
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Назва</label>
    <input type="text" name="title" value="{{ $course->title }}" required>

    <label>Вікова група</label>
    <input type="text" name="age_group" value="{{ $course->age_group }}" required>

    <label>Зображення (оновіть, якщо потрібно)</label>
    <input type="file" name="image">
    @if ($course->image)
    <p>Поточне зображення:</p>
    <img src="{{ asset('storage/' . $course->image) }}" alt="Зображення курсу" width="100">
    @endif

    <label>Безкоштовний перший урок</label>
    <input type="checkbox" name="is_free" value="1" {{ $course->is_free ? 'checked' : '' }}>

    <button type="submit">Оновити курс</button>
</form>
@endsection
