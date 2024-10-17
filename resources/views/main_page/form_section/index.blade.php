@vite(['resources/js/countdown.js', 'resources/css/main_page/form_section.scss'])

<div class="form-section__content container">
    <img src="/media/images/robot.png" width="182" height="177" alt="" class="form-section__image">
    <div class="form-section__timer">
        <span class="form-section__timer-title">
            Поспішай, залишилося:
        </span>
        <div class="form-section__timer-container">
            <div class="form-section__timer-time">
                <span class="form-section__timer-time-number" id="day">
                    00
                </span>
                <span class="form-section__timer-time-text">
                    днів
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
                    годин
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
                    хвилин
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
                    секунд
                </span>
            </div>
        </div>
    </div>
    <div class="form-section__form">
        <h3 class="form-section__form-title">
            Встигніть отримати <span class="form-section__form-title-highlight">безкоштовне заняття</span> в академії BYTE
        </h3>
        <p class="form-section__form-description">
            Просто заповніть дані, і ми зв'яжемося з вами найближчим часом!
        </p>

        @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => 'Хочу безкоштовне заняття'])
    </div>
</div>
