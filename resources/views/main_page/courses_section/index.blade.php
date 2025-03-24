@vite(['resources/css/main_page/courses_section.scss'])

<div class="courses-section__content container">
    <h2 class="courses-section__title">
        @lang('main_page.it_courses')
    </h2>

    <div class="courses-section__cards">
        @foreach ($courses as $course)
            <div class="courses-section__cards-card">
            <img src="{{ asset('storage/' . $course->banner_image) }}" alt="" class="courses-section__cards-card-image">

            <div class="courses-section__cards-card-content">
                <span class="courses-section__cards-card-tag">
                    {{ $course->age_group }}
                </span>

                <h2 class="courses-section__cards-card-title">
                    {{ $course->title }}
                </h2>

                <div class="courses-section__cards-card-gift">
                    <div class="courses-section__cards-card-gift-info">
                        <span class="courses-section__cards-card-gift-info-text">
                            99€ / 8 занять
                        </span>
                    </div>
                </div>

                <button onclick="openModal('consultation')" class="courses-section__cards-card-button default-button">
                    @lang('buttons.button_2')
                </button>

                <a href="{{ route('course.show', ['locale' => app()->getLocale(), 'id' => $course->id]) }}" class="courses-section__cards-card-button default-button-empty">
                    @lang('buttons.button_7')
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
