@extends('layouts.admin')

@section('content')
<h1>Додати банер</h1>
<form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Зображення банера</label>
    <input type="file" name="image" required>
    <input type="file" name="image_mob" required>
    <button type="submit">Додати банер</button>
</form>
@endsection
