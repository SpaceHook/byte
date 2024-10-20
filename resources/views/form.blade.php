@vite(['resources/js/form.js', 'resources/css/form.scss'])

<form class="form" action="{{ route('form.submit', ['locale' => app()->getLocale()]) }}" method="POST">
    @csrf
    <div class="form__fields">
        @if(isset($fields) && in_array('name', $fields))
        <div class="form__fields-field">
                <span class="form__fields-field-name">
                    @lang('form.your_name')
                </span>

            <div class="form__fields-field-inputs">
                <input type="text" name="name" placeholder="{{__('form.name')}}" class="form__fields-field-input default-input">
                <input type="text" name="surname" placeholder="{{__('form.surname')}}" class="form__fields-field-input default-input">
            </div>
        </div>
        @endif

        @if(isset($fields) && in_array('email', $fields))
        <div class="form__fields-field">
                <span class="form__fields-field-name">
                    @lang('form.your_email')
                </span>

            <div class="form__fields-field-inputs">
                <input type="email" name="email" placeholder="Email" class="form__fields-field-input default-input">
            </div>
        </div>
        @endif

        @if(isset($fields) && in_array('phone', $fields))
        <div class="form__fields-field">
                <span class="form__fields-field-name">
                    @lang('form.your_phone')
                </span>

            <div class="form__fields-field-selector">
                <div class="form__fields-field-selector-dropdown">
                    <img src="/media/images/flag_ua.png" alt="" width="16" height="16" class="form__fields-field-selector-dropdown-icon">
                    <span class="form__fields-field-selector-dropdown-number">+380</span>
                </div>
                <span class="form__fields-field-selector-line"></span>
                <input type="text" name="phone" class="form__fields-field-input dropdown-input" placeholder="{{__('form.phone')}}">
            </div>
        </div>
        @endif
    </div>

    <button type="submit" class="form-section__button arrow-button">
        <span class="form-section__button-text">
            {{  $buttonText ?? 'Відправити' }}
        </span>
        <img src="/media/icons/right.svg" alt="" class="form-section__button-icon">
    </button>
</form>

