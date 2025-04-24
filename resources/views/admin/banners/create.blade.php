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

<form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати банер</h1>
        <button type="submit" class="button button-action--add">Додати банер</button>
    </div>

    @csrf

    @php $locales = ['ua' => '🇺🇦 UA', 'ru' => '🇷🇺 RU', 'sk' => '🇸🇰 SK']; @endphp

    <div class="create__content">
        <div class="tab-links">
            @foreach($locales as $key => $label)
            <a href="#tab-{{ $key }}" class="tab-links__link {{ $loop->first ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($locales as $locale => $label)
            <div id="tab-{{ $locale }}" class="tab {{ $loop->first ? 'active' : '' }}">
                <div class="create__option">
                    <span class="create__option-name">Банер ({{ strtoupper($locale) }}) — Десктоп</span>
                    <input type="file" name="translations[{{ $locale }}][image]" onchange="previewImage(this, 'preview-{{ $locale }}-desktop')" required>
                    <img id="preview-{{ $locale }}-desktop" src="" alt="Preview" class="create__option-preview">
                </div>

                <div class="create__option">
                    <span class="create__option-name">Банер ({{ strtoupper($locale) }}) — Мобільний</span>
                    <input type="file" name="translations[{{ $locale }}][image_mob]" onchange="previewImage(this, 'preview-{{ $locale }}-mobile')">
                    <img id="preview-{{ $locale }}-mobile" src="" alt="Preview" class="create__option-preview">
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

    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
