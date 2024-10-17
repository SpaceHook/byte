@vite(['resources/js/form.js', 'resources/css/form.scss'])

<form class="form">
    <div class="form__fields">
        @if(isset($fields) && in_array('name', $fields))
            <div class="form__fields-field">
                <span class="form__fields-field-name">
                    Ваше імʼя
                </span>

                <div class="form__fields-field-inputs">
                    <input type="text" placeholder="Name"  class="form__fields-field-input default-input">
                    <input type="text" placeholder="Surname"  class="form__fields-field-input default-input">
                </div>
            </div>
        @endif
        @if(isset($fields) && in_array('email', $fields))
            <div class="form__fields-field">
                <span class="form__fields-field-name">
                    Ваш email
                </span>

                <div class="form__fields-field-inputs">
                    <input type="text" placeholder="Email" class="form__fields-field-input default-input">
                </div>
            </div>
        @endif

        @if(isset($fields) && in_array('phone', $fields))
            <div class="form__fields-field">
                <span class="form__fields-field-name">
                    Ваш номер телефону
                </span>

                <label class="form__fields-field-selector">
                    <span class="form__fields-field-selector-dropdown-menu">
                        <img src="/media/images/flag_sk.png" alt="" width="16" height="16" class="form__fields-field-selector-dropdown-menu-icon">
                        <span class="form__fields-field-selector-dropdown-menu-number">+421</span>
                        <svg class="form__fields-field-selector-dropdown-menu-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6667 6L8.00004 10.6667L3.33337 6" stroke="black" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="form__fields-field-selector-line"></span>
                    <input type="text" class="form__fields-field-input dropdown-input" placeholder="Phone number">
                </label>
            </div>
        @endif
    </div>

    <button class="form-section__button arrow-button">
        <span class="form-section__button-text">
            {{  $buttonText ?? 'Відправити' }}
        </span>
        <img src="/media/icons/right.svg" alt="" class="form-section__button-icon">
    </button>
</form>
