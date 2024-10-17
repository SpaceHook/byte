@vite(['resources/css/main_page/question_section.scss'])

<div class="question-section__content container">
    <img src="/media/images/people.png" alt="" width="321" height="266" class="question-section__image">

    <div class="question-section__form">
        <h3 class="question-section__form-title">
            У вас є питання?
        </h3>

        <div class="question-section__form-description">
            Розповімо про навчання в BYTE академії, відповімо на ваші запитання
        </div>

        <div class="question-section__form-container">
            @include('form', ['fields' => ['phone'], 'buttonText' => 'Чекаю на дзвінок'])
        </div>
    </div>
</div>
