@extends('layouts.admin')

@section('content')
<div class="admin__section-header">
    <h1 class="title">Банери для слайдера</h1>
    <a href="{{ route('admin.banners.create') }}" class="button">Додати банер</a>
</div>

<div class="banner-list">
    @foreach ($banners as $banner)
    <div class="banner-item">
        <img src="{{ asset('storage/' . $banner->image) }}" alt="Банер" width="150">
        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
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
