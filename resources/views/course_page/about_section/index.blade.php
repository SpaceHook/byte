@vite(['resources/css/course/about_section.scss'])

@php
    $skills = json_decode($course->skills, true) ?? [];
@endphp

<div class="about-section__content container">
    <div class="about-section__block">
        <span class="about-section__block-title">
            @lang('course_page.about_course')
        </span>

        <p class="about-section__block-text">
            {{ $course->about_text }}
        </p>
    </div>

    <div class="about-section__block">
        <span class="about-section__block-title">
            @lang('course_page.child_learn')
        </span>

        @if(!empty($skills))
            <div class="about-section__block-options">
                @foreach($skills as $skill)
                    <div class="about-section__block-options-option">
                        <span class="about-section__block-options-option-title">
                            {{ $skill['title'] }}
                        </span>
                        <span class="about-section__block-text">
                            {{ $skill['description'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
