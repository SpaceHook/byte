@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагування банера</h1>
        <button type="submit" class="button button-action--add">Оновити банер</button>
    </div>

    @csrf
    @method('PUT')

    @php $locales = ['ua' => '🇺🇦 UA', 'ru' => '🇷🇺 RU', 'sk' => '🇸🇰 SK']; @endphp

    <div class="edit__content">
        <div class="tab-links">
            @foreach($locales as $key => $label)
            <a href="#tab-{{ $key }}" class="tab-links__link {{ $loop->first ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($locales as $locale => $label)
            @php
            $translation = $banner->translations->where('locale', $locale)->first();
            @endphp
            <div id="tab-{{ $locale }}" class="tab {{ $loop->first ? 'active' : '' }}">
                <div class="edit__option">
                    <div class="edit__option-content edit__option-old">
                        @if($translation?->image)
                        <span class="edit__option-name">Поточне зображення ({{ strtoupper($locale) }})</span>
                        <img src="{{ asset('storage/' . $translation->image) }}" alt="Image" class="edit__option-image">
                        @endif
                    </div>

                    <div class="edit__option-content edit__option-new">
                        <div class="edit__option-content-header">
                            <span class="edit__option-name">Нове зображення ({{ strtoupper($locale) }})</span>
                            <input type="file" name="translations[{{ $locale }}][image]" onchange="previewImage(this, 'preview-{{ $locale }}-desktop')">
                        </div>
                        <img id="preview-{{ $locale }}-desktop" src="" class="edit__option-preview">
                    </div>
                </div>

                <div class="edit__option">
                    <div class="edit__option-content edit__option-old">
                        @if($translation?->image_mob)
                        <span class="edit__option-name">Поточне зображення (моб.) ({{ strtoupper($locale) }})</span>
                        <img src="{{ asset('storage/' . $translation->image_mob) }}" alt="Mobile Image" class="edit__option-image">
                        @endif
                    </div>

                    <div class="edit__option-content edit__option-new">
                        <div class="edit__option-content-header">
                            <span class="edit__option-name">Нове зображення (моб.) ({{ strtoupper($locale) }})</span>
                            <input type="file" name="translations[{{ $locale }}][image_mob]" onchange="previewImage(this, 'preview-{{ $locale }}-mobile')">
                        </div>
                        <img id="preview-{{ $locale }}-mobile" src="" class="edit__option-preview">
                    </div>
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
