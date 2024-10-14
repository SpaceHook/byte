@extends('layouts.admin')

@section('content')
<h1>Список новин</h1>
<a href="{{ route('admin.news.create') }}">Додати новину</a>
@foreach ($news as $item)
<h2>{{ $item->title }}</h2>
<p>{{ $item->content }}</p>
<a href="{{ route('admin.news.edit', $item->id) }}">Редагувати</a>
<form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Видалити</button>
</form>
@endforeach
@endsection
