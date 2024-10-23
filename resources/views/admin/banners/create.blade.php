@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати банер</h1>
        <button type="submit" class="button button-action--add">Додати банер</button>
    </div>

    <div class="create__content">
        @csrf
        <div class="create__option">
            <span class="create__option-name">Банер (Десктоп)</span>
            <input type="file" name="image" id="image" required onchange="previewImage(this, 'desktop-preview')">
            <img id="desktop-preview" src="" alt="Desktop Banner Preview" class="create__option-preview">
        </div>
        <div class="create__option">
            <span class="create__option-name">Банер (Телефон)</span>
            <input type="file" name="image_mob" id="image_mob" required onchange="previewImage(this, 'mobile-preview')">
            <img id="mobile-preview" src="" alt="Mobile Banner Preview" class="create__option-preview">
        </div>
    </div>
</form>
@endsection
