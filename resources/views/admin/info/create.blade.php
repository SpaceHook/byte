@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.info.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати інформацію</h1>

        <button type="submit" class="button button-action--add">Додати інформацію</button>
    </div>

    @csrf

    <div class="create__content">
        <div class="create__option">
            <span class="create__option-name">Заголовок</span>
            <input type="text" name="title" required class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Зображення</span>
            <input type="file" name="image" id="image" onchange="previewImage(this, 'image-preview')" required>
            <img id="image-preview" src="" alt="Desktop image preview" class="create__option-preview">
        </div>
    </div>
</form>
@endsection
