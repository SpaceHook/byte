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
<form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="create">
    <div class="admin__section-header">
        <h1 class="title">Додати курс</h1>
        <button type="submit" class="button button-action--add">Додати курс</button>
    </div>

    @csrf

    <div class="create__content">

        @php $locales = ['ua' => '🇺🇦 UA', 'ru' => '🇷🇺 RU', 'sk' => '🇸🇰 SK']; @endphp

        <div class="tab-links">
            @foreach($locales as $key => $label)
                <a href="#tab-{{ $key }}" class="tab-links__link {{ $loop->first ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <div class="tab-content">
            @foreach($locales as $locale => $label)
            <div id="tab-{{ $locale }}" class="tab {{ $loop->first ? 'active' : '' }}">
                <div class="create__option">
                    <span class="create__option-name">Назва курсу</span>
                    <input type="text" name="title[{{ $locale }}]" class="input" required>
                </div>

                <div class="create__option">
                    <span class="create__option-name">Підзаголовок</span>
                    <input type="text" name="subtitle[{{ $locale }}]" class="input">
                </div>

                <div class="create__option">
                    <span class="create__option-name">Опис курсу</span>
                    <textarea name="about_text[{{ $locale }}]" class="input textarea"></textarea>
                </div>

                <div class="create__option">
                    <span class="create__option-name">Вікова група</span>
                    <input type="text" name="age_group[{{ $locale }}]" class="input" required>
                </div>

                <div class="create__option">
                    <span class="create__option-name">Навички</span>
                    <div id="skills-{{ $locale }}" class="create__option-skills">
                        <div class="create__option-skill skill-item">
                            <input type="text" name="skills[{{ $locale }}][0][title]" required placeholder="Назва навички" class="create__option-skill-input input">
                            <textarea name="skills[{{ $locale }}][0][description]" required placeholder="Опис навички" class="create__option-skill-textarea input textarea"></textarea>
                        </div>
                    </div>
                    <button type="button" onclick="addSkill('{{ $locale }}')" class="button button-action--add">Додати навичку</button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="create__option">
            <span class="create__option-name">Ціна (₴)</span>
            <input type="number" name="price" step="0.01" min="0" class="input">
        </div>

        <div class="create__option">
            <span class="create__option-name">Персоналія (зображення)</span>
            <input type="file" name="person" onchange="previewImage(this, 'person-preview')" required>
            <img id="person-preview" src="" alt="Person image preview" class="create__option-preview">
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
            <span class="create__option-name">Банер</span>
            <input type="file" name="banner_image" id="banner_image" onchange="previewImage(this, 'banner-preview')" required>
            <img id="banner-preview" src="" alt="Banner image preview" class="create__option-preview">
        </div>

        <div class="create__option">
            <span class="create__option-name">Логотипи (можна вибрати кілька)</span>
            <input type="file" name="logos[]" id="logos" multiple onchange="previewMultipleImages(event, 'logos-preview')">
            <div id="logos-preview" class="create__logos-preview"></div>
        </div>
    </div>
</form>

<script>
    document.querySelector('form.create').addEventListener('submit', function (e) {
        document.querySelectorAll('.skill-item').forEach(item => {
            const title = item.querySelector('input[name*="[title]"]');
            const desc = item.querySelector('textarea[name*="[description]"]');
            const titleEmpty = !title.value.trim();
            const descEmpty = !desc.value.trim();
            if (titleEmpty && descEmpty) item.remove();
        });
    });

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

    function previewMultipleImages(event, previewContainerId) {
        const container = document.getElementById(previewContainerId);
        container.innerHTML = '';
        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('create__option-preview');
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
        div.classList.add('create__option-skill');
        div.innerHTML = `
            <input type="text" name="skills[${locale}][${index}][title]" placeholder="Назва навички" class="create__option-skill-input input">
            <textarea name="skills[${locale}][${index}][description]" placeholder="Опис навички" class="create__option-skill-textarea input textarea"></textarea>
            <button type="button" onclick="this.parentElement.remove()" class="create__option-skill-button button-action button-action--delete">
                <img src="/media/icons/trash.svg" alt="Видалити" width="24" height="24">
            </button>
        `;
        container.appendChild(div);
    }
</script>
@endsection