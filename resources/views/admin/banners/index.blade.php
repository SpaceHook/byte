@extends('layouts.admin')
@vite(['resources/css/admin/banners.scss'])

@section('content')
<div class="admin__section-header">
    <h1 class="title">Банери для слайдера</h1>
    <a href="{{ route('admin.banners.create') }}" class="button">Додати банер</a>
</div>

<div class="banners">
    <span class="banners__title">ID</span>
    <span class="banners__title">Картинка(Десктоп)</span>
    <span class="banners__title">Картинка(Телефон)</span>
    <span class="banners__title">Дії</span>
    @foreach ($banners as $banner)
        <div class="banners__id">
            {{$banner->id}}
        </div>

        <img src="{{ asset('storage/' . $banner->image) }}" alt="Банер" class="banners__image">
        <img src="{{ asset('storage/' . $banner->image_mob) }}" alt="Банер" class="banners__image">

        <div class="banners__actions">
            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="button-action">
                <img src="/media/icons/edit.svg" alt="Редагувати" width="24" height="24">
            </a>

            <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="banners__banner-delete">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-action button-action--delete">
                    <img src="/media/icons/trash.svg" alt="Видалити" width="24" height="24">
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
