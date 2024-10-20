@extends('layouts.admin')

@vite(['resources/css/admin/courses.scss'])

@section('content')
<div class="admin__section-header">
    <h1 class="title">Курси</h1>
    <a href="{{ route('admin.courses.create') }}" class="button">Додати курс</a>
</div>

<div class="courses">
    <span class="courses__title">ID</span>
    <span class="courses__title">Назва</span>
    <span class="courses__title">Вікова група</span>
    <span class="courses__title">Безкоштовний урок</span>
    <span class="courses__title">Картинка</span>
    <span class="courses__title">Дії</span>
    @foreach ($courses as $course)
        <span class="courses__text">
            {{$course->id}}
        </span>
        <span class="courses__text">
            {{$course->title}}
        </span>
        <span class="courses__text">
            {{$course->age_group}}
        </span>
        <input type="checkbox" checked="{{$course->is_free}}" disabled class="courses__text"/>
        <img src="{{ asset('storage/' . $course->image) }}" alt="Банер" class="courses__image">

        <div class="courses__actions">
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
        </div>
    @endforeach
</div>

@endsection
