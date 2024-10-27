@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагування курсу</h1>

        <button type="submit" class="button button-action--add">Оновити курс</button>
    </div>
    @csrf
    @method('PUT')
    <div class="edit__content">
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Назва</span>
                <input type="text" name="title" value="{{ $course->title }}" class="input" required>
            </div>
        </div>
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Вікова група</span>
                <input type="text" name="age_group" value="{{ $course->age_group }}" class="input" required>
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($course->image)
                    <span class="edit__option-name">Поточне зображення</span>
                    <img src="{{ asset('storage/' . $course->image) }}" alt="Зображення курсу" class="edit__option-image">
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

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Безкоштовний перший урок</span>
                <input type="checkbox" name="is_free" value="1" class="input-check" {{ $course->is_free ? 'checked' : '' }}>
            </div>
        </div>
    </div>
</form>
@endsection
