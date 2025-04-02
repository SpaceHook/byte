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
    <span class="courses__title">Ціна</span>
    <span class="courses__title">Вікова група</span>
    <span class="courses__title">Період навчання(міс.)</span>
    <span class="courses__title">К-сть занять</span>
    <span class="courses__title">Банер</span>
    <span class="courses__title">Дії</span>
    @foreach ($courses as $course)
        <span class="courses__text">
            {{$course->id}}
        </span>
        <span class="courses__text">
            {{$course->translation('ua')?->title}}
        </span>
        <span class="courses__text">
            {{$course->price}}€
        </span>
        <span class="courses__text">
            {{$course->translation('ua')?->age_group}}
        </span>
        <span class="courses__text">
            {{$course->period_months}}
        </span>
        <span class="courses__text">
            {{$course->lessons_count}}
        </span>

        <img src="{{ asset('storage/' . $course->banner_image) }}" alt="Банер" class="courses__image">

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
