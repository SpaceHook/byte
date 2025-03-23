@extends('layouts.admin')

@vite(['resources/css/admin/create.scss', 'resources/js/admin/index.js'])

@section('content')
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати курс</h1>
        <button type="submit" class="button button-action--add">Додати курс</button>
    </div>

    @csrf

    <div class="create__content">
        <div class="create__option">
            <span class="create__option-name">Назва</span>
            <input type="text" name="title" required class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Підзаголовок</span>
            <input type="text" name="subtitle" class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Вікова група</span>
            <input type="text" name="age_group" required class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Персоналія</span>
            <input type="text" name="person" class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Тривалість (міс.)</span>
            <input type="number" name="period_months" required min="1" class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Кількість уроків</span>
            <input type="number" name="lessons_count" required min="1" class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Опис курсу</span>
            <textarea name="about_text" class="input textarea"></textarea>
        </div>

        <div class="create__option">
            <span class="create__option-name">Банер</span>
            <input type="file" name="banner_image" id="banner_image" onchange="previewImage(this, 'banner-preview')" required>
            <img id="banner-preview" src="" alt="Banner image preview" class="create__option-preview">
        </div>

        <div class="create__option">
            <span class="create__option-name">Логотипи (можна вибрати кілька)</span>
            <input type="file" name="logos[]" id="logos" multiple onchange="previewMultipleImages(event, 'logos-preview')">
            <div id="logos-preview" class="create__logos-preview"></div>
        </div>

        <div class="create__option">
            <span class="create__option-name">Навички</span>
            <div id="skills-container">
                <div class="skill-item">
                    <input type="text" name="skills[0][title]" placeholder="Назва навички" class="input">
                    <textarea name="skills[0][description]" placeholder="Опис навички" class="input textarea"></textarea>
                    <button type="button" onclick="removeSkill(this)" class="button-action button-action--delete">Видалити</button>
                </div>
            </div>
            <button type="button" onclick="addSkill()" class="button">Додати навичку</button>
        </div>
    </div>
</form>

<script>
    document.querySelector('.create').addEventListener('submit', function(event) {
        console.log('Форма відправляється...'); // Має з'явитися в Console
    });
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
                img.classList.add('create__option-preview');
                container.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }

    let skillIndex = 1;

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
