@vite(['resources/css/main_page/question_section.scss'])

<div class="question-section__content container">
    <img src="/media/images/people.png" alt="" width="321" height="266" class="question-section__image">

    <div class="question-section__form">
        <h3 class="question-section__form-title">
            @lang('main_page.have_question')
        </h3>

        <div class="question-section__form-description">
            @lang('main_page.will_tell')
        </div>

        <div class="question-section__form-container">
            @include('form', ['fields' => ['phone'], 'buttonText' => __('buttons.button_4')])
        </div>
    </div>
</div>
