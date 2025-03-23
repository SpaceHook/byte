@vite(['resources/css/main_page/courses_section.scss'])

<div class="courses-section__content container">
    <h2 class="courses-section__title">
        @lang('main_page.it_courses')
    </h2>

    <div class="courses-section__cards">
        @foreach ($courses as $course)
            <div class="courses-section__cards-card">
            <img src="{{ asset('storage/' . $course->image) }}" alt="" class="courses-section__cards-card-image">

            <div class="courses-section__cards-card-content">
                <span class="courses-section__cards-card-tag">
                    {{ $course->age_group }}
                </span>

                <h2 class="courses-section__cards-card-title">
                    {{ $course->title }}
                </h2>

                @if($course->is_free)
                    <div class="courses-section__cards-card-gift">
                        <img src="/media/images/gift.png" alt="" class="courses-section__cards-card-gift-image">
                        <div class="courses-section__cards-card-gift-info">
                            <span class="courses-section__cards-card-gift-info-text">
                                @lang('main_page.first_lesson')
                            </span>
                            <span class="courses-section__cards-card-gift-info-text courses-section__cards-card-gift-info-text-large">
                                @lang('main_page.free')
                            </span>
                        </div>
                    </div>
                @endif

                <a href="{{ route('course.show', ['locale' => app()->getLocale(), 'id' => $course->id]) }}" class="courses-section__cards-card-button default-button">
                    @lang('buttons.button_2')
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
