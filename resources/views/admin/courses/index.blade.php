@extends('layouts.admin')

@section('content')
<div class="admin__section-header">
    <h1 class="title">Курси</h1>
    <a href="{{ route('admin.courses.create') }}" class="button">Додати курс</a>
</div>

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

            <a href="{{ route('admin.courses.edit', $course->id) }}" class="button-action">
                <img src="/media/icons/edit.svg" alt="" width="24" height="24">
            </a>
            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
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
