@vite(['resources/css/course/main_section.scss'])

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
            Обучаем логическому мышлению и развиваем творческие способности ребенка в игровой форме
        </p>

        <button onclick="openModal('consultation')" class="main-section__info-button default-button">
            @lang('buttons.button_2')
        </button>

        <div class="main-section__info-icons">
            <img src="/media/icons/course/scratch.svg" alt="" class="main-section__info-icons-icon">
            <img src="/media/icons/course/calligrakrita.svg" alt="" class="main-section__info-icons-icon">
            <img src="/media/icons/course/tinkercad.svg" alt="" class="main-section__info-icons-icon">
            <img src="/media/icons/course/youtube.svg" alt="" class="main-section__info-icons-icon">
        </div>
    </div>

    <div class="main-section__benefits">
        <div class="main-section__benefits-benefit">
            <div class="main-section__benefits-benefit-texts">
                <span class="main-section__benefits-benefit-title">
                    6 місяців
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
                    48 занять
                </span>
                <span class="main-section__benefits-benefit-description">
                    в ігровій формі
                </span>
            </div>
        </div>
    </div>
</div>
