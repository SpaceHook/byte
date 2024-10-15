@extends('layouts.admin')

@section('content')
<h1>Додати курс</h1>
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Назва</label>
    <input type="text" name="title" required>

    <label>Вікова група</label>
    <input type="text" name="age_group" required>

    <label>Зображення</label>
    <input type="file" name="image" required>

    <label>Безкоштовний перший урок</label>
    <input type="checkbox" name="is_free" value="1">

    <button type="submit">Додати курс</button>
</form>
@endsection
