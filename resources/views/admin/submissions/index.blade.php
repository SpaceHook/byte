@extends('layouts.admin')

@vite(['resources/css/admin/submissions.scss'])

@section('content')
    <div class="admin__section-header">
        <h1 class="title">Надіслані форми</h1>
    </div>

    @if($submissions->isEmpty())
        <p>Немає надісланих форм.</p>
    @else
        <div class="submissions">
            <span class="submissions__title">ID</span>
            <span class="submissions__title">Ім'я</span>
            <span class="submissions__title">Прізвище</span>
            <span class="submissions__title">Email</span>
            <span class="submissions__title">Телефон</span>
            <span class="submissions__title">Дата</span>
            <span class="submissions__title">Дії</span>

            @foreach ($submissions as $submission)
                <div class="submissions__id">
                    {{$submission->id}}
                </div>
                <div class="submissions__id">
                    {{$submission->name}}
                </div>
                <div class="submissions__id">
                    {{$submission->surname}}
                </div>
                <div class="submissions__id">
                    {{$submission->email}}
                </div>
                <div class="submissions__id">
                    {{$submission->phone}}
                </div>
                <div class="submissions__id">
                    {{$submission->created_at->format('d.m.Y H:i')}}
                </div>
                <form action="{{ route('admin.submissions.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити цей запис?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button-action button-action--delete">
                        <img src="/media/icons/trash.svg" alt="Видалити" width="24" height="24">
                    </button>
                </form>
            @endforeach
        </div>
    @endif
@endsection
