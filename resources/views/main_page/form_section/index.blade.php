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
    <form class="form-section__form">
        <h3 class="form-section__form-title">
            Встигніть отримати <span class="form-section__form-title-highlight">безкоштовне заняття</span> в академії BYTE
        </h3>
        <p class="form-section__form-description">
            Просто заповніть дані, і ми зв'яжемося з вами найближчим часом!
        </p>

        <div class="form-section__form-fields">
            <div class="form-section__form-fields-field">
                <span class="form-section__form-fields-field-name">
                    Ваше імʼя
                </span>

                <div class="form-section__form-fields-field-inputs">
                    <input type="text" class="form-section__form-fields-field-input default-input">
                    <input type="text" class="form-section__form-fields-field-input default-input">
                </div>
            </div>
            <div class="form-section__form-fields-field">
                <span class="form-section__form-fields-field-name">
                    Ваш email
                </span>

                <div class="form-section__form-fields-field-inputs">
                    <input type="text" class="form-section__form-fields-field-input default-input">
                </div>
            </div>
            <div class="form-section__form-fields-field">
                <span class="form-section__form-fields-field-name">
                    Ваш номер телефону
                </span>

                <label class="form-section__form-fields-field-selector">
                    <span class="form-section__form-fields-field-selector-dropdown-menu">
                        <img src="/media/images/flag_sk.png" alt="" width="16" height="16" class="form-section__form-fields-field-selector-dropdown-menu-icon">
                        <span class="form-section__form-fields-field-selector-dropdown-menu-number">+421</span>
                        <svg class="form-section__form-fields-field-selector-dropdown-menu-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6667 6L8.00004 10.6667L3.33337 6" stroke="black" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="form-section__form-fields-field-selector-line"></span>
                    <input type="text" class="form-section__form-fields-field-input dropdown-input" placeholder="Phone number">
                </label>
            </div>
        </div>

        <button class="form-section__button arrow-button">
            <span class="form-section__button-text">
                Хочу безкоштовне заняття
            </span>
            <img src="/media/icons/right.svg" alt="" class="form-section__button-icon">
        </button>
    </form>
</div>
