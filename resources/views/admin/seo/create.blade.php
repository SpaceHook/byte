@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.seo.store') }}" method="POST" class="create">
    @csrf
    <div class="admin__section-header">
        <h1 class="title">Додати SEO-текст</h1>
        <button type="submit" class="button button-action--add">Зберегти</button>
    </div>

    <div class="create__content">
        <div class="create__option">
            <span class="create__option-name">Назва сторінки (ключ)</span>
            <input type="text" name="page" class="input" required>
        </div>

        @php $locales = ['ua' => 'UA 🇺🇦', 'ru' => 'RU 🇷🇺', 'sk' => 'SK 🇸🇰']; @endphp

        <div class="tab-links">
            @foreach($locales as $key => $label)
            <a href="#tab-{{ $key }}" class="tab-links__link {{ $loop->first ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($locales as $locale => $label)
            <div id="tab-{{ $locale }}" class="tab {{ $loop->first ? 'active' : '' }}">
                <div class="create__option">
                    <span class="create__option-name">Meta Title</span>
                    <input type="text" name="meta_title[{{ $locale }}]" class="input">
                </div>

                <div class="create__option">
                    <span class="create__option-name">Meta Description</span>
                    <textarea name="meta_description[{{ $locale }}]" class="input textarea"></textarea>
                </div>

                <div class="create__option">
                    <span class="create__option-name">Meta Keywords</span>
                    <input type="text" name="meta_keywords[{{ $locale }}]" class="input">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</form>

<script>
    document.querySelectorAll('.tab-links__link').forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelectorAll('.tab-links__link').forEach(li => li.classList.remove('active'));
            this.classList.add('active');
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            document.querySelector(this.getAttribute('href')).classList.add('active');
        });
    });
</script>
@endsection