@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагування банера</h1>

        <button type="submit" class="button button-action--add">Оновити банер</button>
    </div>

    @csrf
    @method('PUT')

    <div class="edit__content">
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($banner->image)
                    <span class="edit__option-name">Поточне зображення</span>
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="Зображення банера" class="edit__option-image">
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
                @if($banner->image_mob)
                    <span class="edit__option-name">Поточне зображення(моб.)</span>
                    <img src="{{ asset('storage/' . $banner->image_mob) }}" alt="Мобільне зображення банера" class="edit__option-image">
                @endif
            </div>

            <div class="edit__option-content edit__option-new">
                <div class="edit__option-content-header">
                    <span class="edit__option-name">Нове зображення(моб.)</span>
                    <input type="file" name="image_mob" id="image_mob" onchange="previewImage(this, 'image_mob-preview')">
                </div>
                 <img id="image_mob-preview" src="" alt="" class="edit__option-preview">
            </div>
        </div>
    </div>
</form>
@endsection
