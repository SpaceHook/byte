@php
    $currentRouteName = Route::currentRouteName();
    $currentRouteParams = request()->route()->parameters();
@endphp

<div class="header__content container">
    <a href="{{route('main_page.index', ['locale' => app()->getLocale()])}}" class="header__logo">
        <img
            src="/media/icons/byte_logo.svg"
            alt=""
            class="header__logo-icon"
            width="89"
            height="24"
        >
    </a>
    <div class="header__info">
        <div class="header__links">
            <button class="header__links-link">
                @lang('navigation.about')
            </button>
            <button class="header__links-link" onclick="scrollToSection('courses')">
                @lang('navigation.courses')
            </button>
            <button class="header__links-link" onclick="scrollToSection('contacts')">
                @lang('navigation.contacts')
            </button>
        </div>

        <div class="header__socials">
            <a href="https://t.me/+421952279887" target="_blank" class="header__socials-social">
                <img src="/media/icons/telegram.svg" alt="" class="header__socials-social-icon">
            </a>
            <a href="https://chats.viber.com/+421952279887" target="_blank"  class="header__socials-social">
                <img src="/media/icons/viber.svg" alt="" class="header__socials-social-icon">
            </a>
        </div>

        <div class="header__contact">
            <a href="tel:+421952279887" class="header__phone">
                +421 (952) 27 98 87
            </a>

            <button class="header__button default-button" onclick="openModal('lesson')">
                <span class="header__button-text">
                    @lang('buttons.button_1')
                </span>
            </button>
        </div>

        <div class="header__language">
            <div class="header__language-current">
                <span class="header__language-current-name">
                    UA
                </span>

                <svg class="header__language-current-icon" width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 2L5 6L9 2" stroke="currentColor" stroke-width="1.33333"/>
                </svg>
            </div>

            <div class="header__language-dropdown">
                <a href="{{ route($currentRouteName, array_merge($currentRouteParams, ['locale' => 'ua'])) }}" class="header__language-dropdown-lang">UA</a>
                <a href="{{ route($currentRouteName, array_merge($currentRouteParams, ['locale' => 'sk'])) }}" class="header__language-dropdown-lang">SK</a>
                <a href="{{ route($currentRouteName, array_merge($currentRouteParams, ['locale' => 'ru'])) }}" class="header__language-dropdown-lang">RU</a>
            </div>
        </div>

        <div class="header__burger-icon" onclick="toggleBurgerMenu()">
            <img src="/media/icons/burger_menu.svg" alt="" width="32" height="32" class="header__burger-icon-close">
            <img src="/media/icons/close_menu.svg" alt="" width="32" height="32" class="header__burger-icon-open">
        </div>

        <div class="header__burger-menu">
            <div class="header__burger-menu-links">
                <button class="header__burger-menu-links-link">
                    @lang('navigation.about')
                </button>
                <button class="header__burger-menu-links-link" onclick="scrollToSection('courses')">
                    @lang('navigation.courses')
                </button>
                <button class="header__burger-menu-links-link" onclick="scrollToSection('contacts')">
                    @lang('navigation.contacts')
                </button>

                <a href="{{route('dogovor.open')}}" target="_blank" class="header__burger-menu-links-link">@lang('navigation.contract')</a>
            </div>

            <div class="header__burger-menu-languages">
                <a href="{{ url('/ua') }}" class="header__burger-menu-languages-lang">
                    UA
                </a>
                <a href="{{ url('/sk') }}" class="header__burger-menu-languages-lang">
                    SK
                </a>
                <a href="{{ url('/ru') }}" class="header__burger-menu-languages-lang">
                    RU
                </a>
            </div>

            <button class="header__burger-menu-button default-button" onclick="openModal('lesson')">
                @lang('buttons.button_1')
            </button>
        </div>
    </div>
</div>
