@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати курс</h1>
        <button type="submit" class="button button-action--add">Додати курс</button>
    </div>

    @csrf

    <div class="create__content">
        @csrf
        <div class="create__option">
            <span class="create__option-name">Назва</span>
            <input type="text" name="title" required class="input">
        </div>
        <div class="create__option">
            <span class="create__option-name">Вікова група</span>
            <input type="text" name="age_group" required class="input">
        </div>
        <div class="create__option">
            <span class="create__option-name">Банер (Телефон)</span>
            <input type="file" name="image" id="image" onchange="previewImage(this, 'image-preview')" required>
            <img id="image-preview" src="" alt="Desktop image preview" class="create__option-preview">
        </div>

        <div class="create__option">
            <span class="create__option-name">Безкоштовний перший урок</span>
            <input type="checkbox" name="is_free" value="1" class="input-check">
        </div>
    </div>
</form>
@endsection
