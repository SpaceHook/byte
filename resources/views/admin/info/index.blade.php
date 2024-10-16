@extends('layouts.admin')

@section('content')
<h1>Список інформацій</h1>
<a href="{{ route('admin.info.create') }}" class="btn btn-primary">Додати інформацію</a>

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
                <button type="submit">Видалити</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection
