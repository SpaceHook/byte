@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.seo.update', $seoText->id) }}" method="POST" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагувати SEO-текст</h1>
        <button type="submit" class="button button-action--add">Оновити SEO-текст</button>
    </div>

    @csrf
    @method('PUT')

    <div class="edit__content">
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                <span class="edit__option-name">Сторінка</span>
                <input type="text" name="page" value="{{ old('page', $seoText->page) }}" class="input" required>
            </div>
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
                <div class="edit__option">
                    <span class="edit__option-name">Meta Title</span>
                    <input type="text" name="meta_title[{{ $locale }}]" value="{{ old('meta_title.' . $locale, $seoText->meta_title[$locale] ?? '') }}" class="input">
                </div>

                <div class="edit__option">
                    <span class="edit__option-name">Meta Description</span>
                    <textarea name="meta_description[{{ $locale }}]" class="textarea">{{ old('meta_description.' . $locale, $seoText->meta_description[$locale] ?? '') }}</textarea>
                </div>

                <div class="edit__option">
                    <span class="edit__option-name">Meta Keywords</span>
                    <textarea name="meta_keywords[{{ $locale }}]" class="textarea">{{ old('meta_keywords.' . $locale, $seoText->meta_keywords[$locale] ?? '') }}</textarea>
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
