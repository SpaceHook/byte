@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.seo.store') }}" method="POST" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати SEO-текст</h1>

        <button type="submit" class="button button-action--add">Додати SEO-текст</button>
    </div>

    @csrf

    <div class="create__content">
        <div class="create__option">
            <span class="create__option-name">Сторінка</span>
            <input type="text" name="page" placeholder="Назва сторінки" class="input" required>
        </div>

        <div class="create__option">
            <span class="create__option-name">Meta Title</span>
            <input type="text" name="meta_title" placeholder="Meta Title" class="input" required>
        </div>

        <div class="create__option">
            <span class="create__option-name">Meta Description</span>
            <textarea name="meta_description" id="meta_description" placeholder="Meta Description" class="textarea"></textarea>
        </div>

        <div class="create__option">
            <span class="create__option-name">Meta Keywords</span>
            <textarea name="meta_description" id="meta_keywords" placeholder="Meta Keywords" class="textarea"></textarea>
        </div>
    </div>
</form>
@endsection
