@extends('layouts.admin')

@section('content')
<h1>Курси</h1>
<a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Додати курс</a>

<table>
    <thead>
    <tr>
        <th>Назва</th>
        <th>Вікова група</th>
        <th>Дії</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->title }}</td>
        <td>{{ $course->age_group }}</td>
        <td>
            <a href="{{ route('admin.courses.edit', $course->id) }}">Редагувати</a>
            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
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
