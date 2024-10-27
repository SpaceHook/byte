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
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Заголовок</span>
                <input type="text" name="title" value="{{ $info->title }}" class="input" required>
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($info->image)
                    <span class="edit__option-name">Поточне зображення</span>
                    <img src="{{ asset('storage/' . $info->image) }}" alt="Зображення курсу" class="edit__option-image">
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
