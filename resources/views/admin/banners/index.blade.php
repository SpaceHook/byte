@extends('layouts.admin')

@section('content')
<h1>Банери для слайдера</h1>
<a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Додати банер</a>

<div class="banner-list">
    @foreach ($banners as $banner)
    <div class="banner-item">
        <img src="{{ asset('storage/' . $banner->image) }}" alt="Банер" width="150">
        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Видалити</button>
        </form>
    </div>
    @endforeach
</div>
@endsection
