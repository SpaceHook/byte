@extends('layouts.admin')

@vite(['resources/css/admin/seo.scss'])

@section('content')
<div class="admin__section-header">
    <h1 class="title">SEO Тексти</h1>
    <a href="{{ route('admin.seo.create') }}" class="button">Додати SEO-текст</a>
</div>

<div class="seo">
    <span class="seo__title">Сторінка</span>
    <span class="seo__title">Meta Title</span>
    <span class="seo__title">Meta Description</span>
    <span class="seo__title">Meta Keywords</span>
    <span class="seo__title">Дії</span>

    @foreach ($seoTexts as $seoText)
        <span class="seo__text">
            {{$seoText->page}}
        </span>
        <span class="seo__text">
            {{$seoText->meta_title}}
        </span>
        <span class="seo__text">
            {{$seoText->meta_description}}
        </span>
        <span class="seo__text">
            {{$seoText->meta_keywords}}
        </span>

        <div class="seo__actions">
            <a href="{{ route('admin.seo.edit', $seoText->id) }}" class="button-action">
                <img src="/media/icons/edit.svg" alt="" width="24" height="24">
            </a>
            <form action="{{ route('admin.seo.destroy', $seoText->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-action button-action--delete">
                    <img src="/media/icons/trash.svg" alt="" width="24" height="24">
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
