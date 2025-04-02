@extends('layouts.admin')

@vite(['resources/css/admin/edit.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="edit">
    <div class="admin__section-header">
        <h1 class="title">Редагування курсу</h1>
        <button type="submit" class="button button-action--add">Оновити курс</button>
    </div>

    @csrf
    @method('PUT')

    <div class="edit__content">
        @php
        $locales = ['ua' => '🇺🇦 UA', 'ru' => '🇷🇺 RU', 'sk' => '🇸🇰 SK'];
        $translations = $course->translations->keyBy('locale');
        $localeData = [];
        foreach ($locales as $locale => $label) {
        $t = $translations[$locale] ?? null;
        $localeData[$locale] = [
            'label' => $label,
            'translation' => $t,
            'skills' => is_string($t?->skills) ? json_decode($t->skills, true) : ($t->skills ?? [])
        ];
        }
        @endphp

        <div class="tab-links">
            @foreach($localeData as $locale => $data)
                <a href="#tab-{{ $locale }}" class="tab-links__link {{ $loop->first ? 'active' : '' }}">{{ $data['label'] }}</a>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($localeData as $locale => $data)
            @php $t = $data['translation']; $skills = $data['skills']; @endphp
            <div id="tab-{{ $locale }}" class="tab {{ $loop->first ? 'active' : '' }}">
                <div class="edit__option">
                    <div class="edit__option-content">
                        <span class="edit__option-name">Назва курсу</span>
                        <input type="text" name="title[{{ $locale }}]" value="{{ $t?->title }}" class="input" required>
                    </div>
                </div>

                <div class="edit__option">
                    <div class="edit__option-content">
                        <span class="edit__option-name">Підзаголовок</span>
                        <input type="text" name="subtitle[{{ $locale }}]" value="{{ $t?->subtitle }}" class="input">
                    </div>
                </div>

                <div class="edit__option">
                    <div class="edit__option-content">
                        <span class="edit__option-name">Опис курсу</span>
                        <textarea name="about_text[{{ $locale }}]" class="input textarea">{{ $t?->about_text }}</textarea>
                    </div>
                </div>

                <div class="edit__option">
                    <div class="edit__option-content">
                        <span class="edit__option-name">Вікова група</span>
                        <input type="text" name="age_group[{{ $locale }}]" value="{{ $t?->age_group }}" class="input" required>
                    </div>
                </div>

                <div class="edit__option">
                    <div class="edit__option-content">
                        <span class="edit__option-name">Навички</span>
                        <div id="skills-{{ $locale }}">
                            @foreach ($skills as $i => $skill)
                            <div class="edit__option-skill skill-item">
                                <input type="text" name="skills[{{ $locale }}][{{ $i }}][title]" value="{{ $skill['title'] }}" class="edit__option-skill-input input" placeholder="Назва навички">
                                <textarea name="skills[{{ $locale }}][{{ $i }}][description]" class="edit__option-skill-textarea input textarea" placeholder="Опис навички">{{ $skill['description'] }}</textarea>
                                <button type="button" onclick="this.parentElement.remove()" class="edit__option-skill-button button-action button-action--delete">
                                    <img src="/media/icons/trash.svg" alt="Видалити" width="24" height="24">
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <button type="button" onclick="addSkill('{{ $locale }}')" class="button button-action--add">Додати нову навичку</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="edit__option">
            <div class="edit__option-content">
                <span class="edit__option-name">Ціна</span>
                <input type="number" name="price" value="{{ $course->price }}" class="input" step="0.01">
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content">
                <span class="edit__option-name">Тривалість (міс.)</span>
                <input type="number" name="period_months" value="{{ $course->period_months }}" min="1" class="input" required>
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content">
                <span class="edit__option-name">Кількість уроків</span>
                <input type="number" name="lessons_count" value="{{ $course->lessons_count }}" min="1" class="input" required>
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($course->banner_image)
                <span class="edit__option-name">Поточний банер</span>
                <img src="{{ asset('storage/' . $course->banner_image) }}" alt="Банер курсу" class="edit__option-image">
                @endif
            </div>
            <div class="edit__option-content edit__option-new">
                <span class="edit__option-name">Новий банер</span>
                <input type="file" name="banner_image" onchange="previewImage(this, 'banner-preview')">
                <img id="banner-preview" src="" alt="Попередній перегляд банера" class="edit__option-preview">
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content">
                <span class="edit__option-name">Персоналія (зображення)</span>
                @if($course->person)
                    <img src="{{ asset('storage/' . $course->person) }}" alt="Person" class="edit__option-image">
                @endif
                <input type="file" name="person" onchange="previewImage(this, 'person-preview')">
                <img id="person-preview" src="" alt="Preview" class="edit__option-preview">
            </div>
        </div>

        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
            <span class="edit__option-name">Логотипи</span>
                @php $logos = json_decode($course->logos, true) ?? []; @endphp
                @foreach ($logos as $logo)
                <img src="{{ asset('storage/' . $logo) }}" alt="Логотип" class="edit__option-logo">
                @endforeach
            </div>
            <div class="edit__option-content edit__option-new">
                <span class="edit__option-name">Нові логотипи</span>
                <input type="file" name="logos[]" multiple onchange="previewMultipleImages(event, 'logos-preview')">
                <div id="logos-preview" class="edit__logos-preview"></div>
            </div>
        </div>
    </div>
</form>

<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function previewMultipleImages(event, previewContainerId) {
        const container = document.getElementById(previewContainerId);
        container.innerHTML = '';
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('edit__option-preview');
                container.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }

    function addSkill(locale) {
        const container = document.getElementById(`skills-${locale}`);
        const index = container.querySelectorAll('.skill-item').length;
        const div = document.createElement('div');
        div.classList.add('skill-item');
        div.innerHTML = `
            <input type="text" name="skills[${locale}][${index}][title]" placeholder="Назва навички" class="input">
            <textarea name="skills[${locale}][${index}][description]" placeholder="Опис навички" class="input textarea"></textarea>
            <button type="button" onclick="this.parentElement.remove()" class="button-action button-action--delete">Видалити</button>
        `;
        container.appendChild(div);
    }

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