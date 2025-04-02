@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.info.update', $info->id) }}" method="POST" enctype="multipart/form-data" class="edit">

    <div class="admin__section-header">
        <h1 class="title">Редагувати інформацію</h1>

        <button type="submit" class="button button-action--add">Оновити інформацію</button>
    </div>

    @csrf
    @method('PUT')

    <div class="edit__content">
        @foreach(['ua', 'ru', 'sk'] as $locale)
        <div class="edit__option">
            <div class="edit__option-content">
                <span class="edit__option-name">Заголовок ({{ strtoupper($locale) }})</span>
                <input type="text" name="title[{{ $locale }}]" required class="input"
                       value="{{ old("title.$locale", $info->translation($locale)?->title) }}">
            </div>
        </div>
        @endforeach

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($info->image)
                <span class="edit__option-name">Поточне зображення</span>
                <img src="{{ asset('storage/' . $info->image) }}" alt="Зображення" class="edit__option-image">
                @endif
            </div>

            <div class="edit__option-content edit__option-new">
                <div class="edit__option-content-header">
                    <span class="edit__option-name">Нове зображення</span>
                    <input type="file" name="image" id="image" onchange="previewImage(this, 'image-preview')">
                </div>
                <img id="image-preview" src="" alt="" class="edit__option-preview">
            </div>
        </div>

    </div>

</form>
@endsection
