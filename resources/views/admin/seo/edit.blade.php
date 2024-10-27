@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.seo.update', $seoText->id) }}" method="POST" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагувати SEO-текст</h1>

        <button type="submit" class="button button-action--add">Оновити SEO-текст</button>
    </div>

    @csrf
    @method('PUT')

    <div class="edit__content">
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Сторінка</span>
                <input type="text" name="page" value="{{ old('page', $seoText->page) }}" class="input" required>
            </div>
        </div>
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Meta Title</span>
                <input type="text" name="meta_title" value="{{ old('meta_title', $seoText->meta_title) }}" class="input" required>
            </div>
        </div>
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Meta Description</span>
                <textarea type="text" name="meta_description" class="textarea" required>{{ old('meta_description', $seoText->meta_description) }}</textarea>
            </div>
        </div>
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Meta Keywords</span>
                <textarea type="text" name="meta_keywords" class="textarea" required>{{ old('meta_keywords', $seoText->meta_keywords) }}</textarea>
            </div>
        </div>
    </div>
</form>
@endsection
