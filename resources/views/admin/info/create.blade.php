@extends('layouts.admin')

@section('content')
<h1>Додати інформацію</h1>
<form action="{{ route('admin.info.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Заголовок</label>
    <input type="text" name="title" required>

    <label>Зображення</label>
    <input type="file" name="image" required>

    <button type="submit">Додати інформацію</button>
</form>
@endsection
