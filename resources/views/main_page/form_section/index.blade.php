@vite(['resources/js/countdown.js', 'resources/css/main_page/form_section.scss'])

<div class="form-section__content container">
    <img src="/media/images/robot.png" width="182" height="177" alt="" class="form-section__image">
    <div class="form-section__timer">
        <span class="form-section__timer-title">
            @lang('main_page.timer_title')
        </span>
        <div class="form-section__timer-container">
            <div class="form-section__timer-time">
                <span class="form-section__timer-time-number" id="day">
                    00
                </span>
                <span class="form-section__timer-time-text">
                    @lang('main_page.days')
                </span>
            </div>
            <span class="form-section__timer-dots">
                :
            </span>
            <div class="form-section__timer-time">
                <span class="form-section__timer-time-number" id="hour">
                    00
                </span>
                <span class="form-section__timer-time-text">
                    @lang('main_page.hours')
                </span>
            </div>
            <span class="form-section__timer-dots">
                :
            </span>
            <div class="form-section__timer-time">
                <span class="form-section__timer-time-number" id="minute">
                    00
                </span>
                <span class="form-section__timer-time-text">
                    @lang('main_page.minutes')
                </span>
            </div>
            <span class="form-section__timer-dots">
                :
            </span>
            <div class="form-section__timer-time">
                <span class="form-section__timer-time-number" id="second">
                    00
                </span>
                <span class="form-section__timer-time-text">
                    @lang('main_page.seconds')
                </span>
            </div>
        </div>
    </div>
    <div class="form-section__form">
        <h3 class="form-section__form-title">
            @lang('main_page.hurry_up_get')
        </h3>
        <p class="form-section__form-description">
            @lang('main_page.just_fill')
        </p>

        @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => __('buttons.button_3')])
    </div>
</div>
