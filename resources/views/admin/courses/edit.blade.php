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
        <div class="edit__option">
            <span class="edit__option-name">Назва</span>
            <input type="text" name="title" value="{{ $course->title }}" class="input" required>
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Підзаголовок</span>
            <input type="text" name="subtitle" value="{{ $course->subtitle }}" class="input">
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Вікова група</span>
            <input type="text" name="age_group" value="{{ $course->age_group }}" class="input" required>
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Персоналія</span>
            <input type="text" name="person" value="{{ $course->person }}" class="input">
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Тривалість (міс.)</span>
            <input type="number" name="period_months" value="{{ $course->period_months }}" min="1" class="input" required>
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Кількість уроків</span>
            <input type="number" name="lessons_count" value="{{ $course->lessons_count }}" min="1" class="input" required>
        </div>

        <div class="edit__option">
            <span class="edit__option-name">Опис курсу</span>
            <textarea name="about_text" class="input textarea">{{ $course->about_text }}</textarea>
        </div>

        <!-- БАНЕР -->
        <div class="edit__option">
            <div class="edit__option-content edit__option-old">
                @if($course->banner_image)
                <span class="edit__option-name">Поточний банер</span>
                <img src="{{ asset('storage/' . $course->banner_image) }}" alt="Банер курсу" class="edit__option-image">
                @endif
            </div>

            <div class="edit__option-content edit__option-new">
                <span class="edit__option-name">Новий банер</span>
                <input type="file" name="banner_image" id="banner_image" onchange="previewImage(this, 'banner-preview')">
                <img id="banner-preview" src="" alt="Попередній перегляд банера" class="edit__option-preview">
            </div>
        </div>

        <!-- ЛОГОТИПИ -->
        <div class="edit__option">
            <span class="edit__option-name">Логотипи</span>
            <div class="edit__option-content edit__option-old">
                @php
                $logos = json_decode($course->logos, true) ?? [];
                @endphp
                @if (!empty($logos))
                @foreach ($logos as $logo)
                <img src="{{ asset('storage/' . $logo) }}" alt="Логотип" class="edit__option-logo">
                @endforeach
                @endif
            </div>

            <div class="edit__option-content edit__option-new">
                <span class="edit__option-name">Додати нові логотипи</span>
                <input type="file" name="logos[]" id="logos" multiple onchange="previewMultipleImages(event, 'logos-preview')">
                <div id="logos-preview" class="edit__logos-preview"></div>
            </div>
        </div>

        <!-- НАВИЧКИ -->
        <div class="edit__option">
            <span class="edit__option-name">Навички</span>
            <div id="skills-container">
                @php
                $skills = json_decode($course->skills, true) ?? [];
                @endphp
                @foreach ($skills as $index => $skill)
                <div class="skill-item">
                    <input type="text" name="skills[{{ $index }}][title]" value="{{ $skill['title'] }}" placeholder="Назва навички" class="input">
                    <textarea name="skills[{{ $index }}][description]" placeholder="Опис навички" class="input textarea">{{ $skill['description'] }}</textarea>
                    <button type="button" onclick="removeSkill(this)" class="button-action button-action--delete">Видалити</button>
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addSkill()" class="button">Додати навичку</button>
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

    let skillIndex = {{ count($skills) }};

    function addSkill() {
        const container = document.getElementById('skills-container');
        const newSkill = document.createElement('div');
        newSkill.classList.add('skill-item');
        newSkill.innerHTML = `
            <input type="text" name="skills[${skillIndex}][title]" placeholder="Назва навички" class="input">
            <textarea name="skills[${skillIndex}][description]" placeholder="Опис навички" class="input textarea"></textarea>
            <button type="button" onclick="removeSkill(this)" class="button-action button-action--delete">Видалити</button>
        `;
        container.appendChild(newSkill);
        skillIndex++;
    }

    function removeSkill(button) {
        button.parentElement.remove();
    }
</script>
@endsection
