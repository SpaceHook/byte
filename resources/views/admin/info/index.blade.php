@extends('layouts.admin')

@section('content')
<div class="admin__section-header">
    <h1 class="title">Список новин</h1>
    <a href="{{ route('admin.info.create') }}" class="button">Додати новину</a>
</div>
<table>
    <thead>
    <tr>
        <th>Заголовок</th>
        <th>Зображення</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($infos as $info)
    <tr>
        <td>{{ $info->title }}</td>
        <td><img src="{{ asset('storage/' . $info->image) }}" alt="Зображення інформації" width="100"></td>
        <td>
            <form action="{{ route('admin.info.destroy', $info->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-action button-action--delete">
                    <img src="/media/icons/trash.svg" alt="" width="24" height="24">
                </button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
