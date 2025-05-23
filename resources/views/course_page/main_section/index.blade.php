@vite(['resources/css/course/main_section.scss'])

@php
  $logos = json_decode($course->logos, true) ?? [];
@endphp
<div class="main-section__content container">
    <div class="main-section__breadcrumbs">
        <span class="main-section__breadcrumbs-text">
            {{ $course->translation()?->title }}
        </span>
    </div>

    <div class="main-section__info">
        <img src="{{asset('storage/' . $course->person)}}" alt="" class="main-section__info-image">

        <h1 class="main-section__info-title">
            {{ $course->translation()?->title }}
        </h1>
        <p class="main-section__info-description">
            {{ $course->translation()?->subtitle }}
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
                    {{  trans_choice('course_page.duration_months', $course->period_months, ['count' => $course->period_months]) }}
                </span>
                <span class="main-section__benefits-benefit-description">
                    @lang('course_page.education')
                </span>
            </div>
        </div>
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    @lang('course_page.certificate')
                </span>
                <span class="main-section__benefits-benefit-description">
                    @lang('course_page.graduation')
                </span>
            </div>
        </div>
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    {{  trans_choice('course_page.lessons_count', $course->lessons_count, ['count' => $course->lessons_count]) }}
                </span>
                <span class="main-section__benefits-benefit-description">
                    @lang('course_page.playful')
                </span>
            </div>
        </div>
    </div>
</div>
