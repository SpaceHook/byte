@vite(['resources/css/main_page/courses_section.scss'])

<div class="courses-section__content container">
    <h2 class="courses-section__title">
        IT курси
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
                                Перший урок
                            </span>
                            <span class="courses-section__cards-card-gift-info-text courses-section__cards-card-gift-info-text-large">
                                БЕЗКОШТОВНО
                            </span>
                        </div>
                    </div>
                @endif

                <button onclick="openModal('consultation')" class="courses-section__cards-card-button default-button">Записатися</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
