@vite(['resources/css/course/main_section.scss'])

@php
  $logos = json_decode($course->logos, true) ?? [];
@endphp
<div class="main-section__content container">
    <div class="main-section__breadcrumbs">
        <span class="main-section__breadcrumbs-text">
            {{$course->title}}
        </span>
    </div>

    <div class="main-section__info">
        <img src="/media/girl.png" alt="" class="main-section__info-image">

        <h1 class="main-section__info-title">
            {{$course->title}}
        </h1>
        <p class="main-section__info-description">
            {{$course->subtitle}}
        </p>

        <button onclick="openModal('consultation')" class="main-section__info-button default-button">
            @lang('buttons.button_2')
        </button>

        @if(!empty($logos))
            <div class="main-section__info-icons">
                @foreach ($logos as $logo)
                    <img src="{{ asset('storage/' . $logo) }}" alt="" class="main-section__info-icons-icon">
                @endforeach
            </div>
        @endif
    </div>

    <div class="main-section__benefits">
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    {{ $course->period_months }} місяців
                </span>
                <span class="main-section__benefits-benefit-description">
                    навчання
                </span>
            </div>
        </div>
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    сертифікат
                </span>
                <span class="main-section__benefits-benefit-description">
                    після закінчення навчання
                </span>
            </div>
        </div>
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    {{ $course->lessons_count }} занять
                </span>
                <span class="main-section__benefits-benefit-description">
                    в ігровій формі
                </span>
            </div>
        </div>
    </div>
</div>
