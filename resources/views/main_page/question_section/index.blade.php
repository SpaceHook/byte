@vite(['resources/css/main_page/question_section.scss'])

<div class="question-section__content container">
    <img src="/media/images/people.png" alt="" width="321" height="266" class="question-section__image">

    <form class="question-section__form">
        <h3 class="question-section__form-title">
            У вас є питання?
        </h3>

        <div class="question-section__form-description">
            Розповімо про навчання в BYTE академії, відповімо на ваші запитання
        </div>

        <div class="question-section__form-field">
            <span class="question-section__form-field-name">
                Ваш номер телефону
            </span>

            <input type="text" class="question-section__form-field-input default-input">
        </div>

        <button class="question-section__form-button arrow-button">
            <span class="question-section__form-button-text">Чекаю на дзвінок</span>
            <img src="/media/icons/right.svg" alt="" class="question-section__form-button-icon">
        </button>
    </form>
</div>
