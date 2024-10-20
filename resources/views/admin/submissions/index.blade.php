@extends('layouts.admin')

@section('content')
<h1>Надіслані форми</h1>

@if($submissions->isEmpty())
<p>Немає надісланих форм.</p>
@else
<table>
    <thead>
    <tr>
        <th>Ім'я</th>
        <th>Прізвище</th>
        <th>Email</th>
        <th>Телефон</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($submissions as $submission)
    <tr>
        <td>{{ $submission->name }}</td>
        <td>{{ $submission->surname }}</td>
        <td>{{ $submission->email }}</td>
        <td>{{ $submission->phone }}</td>
        <td>{{ $submission->created_at->format('d.m.Y H:i') }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
@endif
@endsection
