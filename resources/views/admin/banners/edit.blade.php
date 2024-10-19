@extends('layouts.admin')

@section('content')
<h1>Редагування банера</h1>

<form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Заголовок:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}">
    </div>

    <div>
        <label for="image">Основне зображення (оновіть, якщо потрібно):</label>
        <input type="file" name="image" id="image">
        @if($banner->image)
        <p>Поточне зображення:</p>
        <img src="{{ asset('storage/' . $banner->image) }}" alt="Зображення банера" width="200">
        @endif
    </div>

    <div>
        <label for="image_mob">Мобільне зображення (оновіть, якщо потрібно):</label>
        <input type="file" name="image_mob" id="image_mob">
        @if($banner->image_mob)
        <p>Поточне мобільне зображення:</p>
        <img src="{{ asset('storage/' . $banner->image_mob) }}" alt="Мобільне зображення банера" width="200">
        @endif
    </div>

    <button type="submit">Оновити банер</button>
</form>
@endsection
