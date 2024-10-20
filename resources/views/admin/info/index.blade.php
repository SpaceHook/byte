@extends('layouts.admin')

@vite(['resources/css/admin/info.scss'])

@section('content')
<div class="admin__section-header">
    <h1 class="title">Список новин</h1>
    <a href="{{ route('admin.info.create') }}" class="button">Додати новину</a>
</div>

<div class="info">
    <span class="info__title">ID</span>
    <span class="info__title">Назва</span>
    <span class="info__title">Картинка</span>
    <span class="info__title">Дії</span>
    @foreach ($infos as $info)
        <span class="info__text">
            {{$info->id}}
        </span>
        <span class="info__text">
            {{$info->title}}
        </span>
        <img src="{{ asset('storage/' . $info->image) }}" alt="Банер" class="info__image">

        <div class="info__actions">
            <a href="{{ route('admin.info.edit', $info->id) }}" class="button-action">
                <img src="/media/icons/edit.svg" alt="" width="24" height="24">
            </a>
            <form action="{{ route('admin.info.destroy', $info->id) }}" method="POST" style="display:inline;">
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
