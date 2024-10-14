<div class="header__content container">
    <a href="/" class="header__logo">
        <img
            src="/media/images/byte_logo.png"
            alt=""
            class="header__logo-icon"
            width="89"
            height="24"
        >
    </a>
    <div class="header__info">
        <div class="header__links">
            <a href="#" class="header__links-link">
                Про академію
            </a>
            <a href="#" class="header__links-link">
                Курси
            </a>
            <a href="#" class="header__links-link">
                Контакти
            </a>
        </div>

        <div class="header__socials">
            <a href="#" class="header__socials-social">
                <img src="/media/icons/telegram.svg" alt="" class="header__socials-social-icon">
            </a>
            <a href="#" class="header__socials-social">
                <img src="/media/icons/viber.svg" alt="" class="header__socials-social-icon">
            </a>
        </div>

        <div class="header__contact">
            <a href="tel:+380675102244" class="header__phone">
                +38 067 510 22 44
            </a>

            <button class="header__button default-button">
                <span class="header__button-text">
                    Безкоштовний урок
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
                <a href="{{ url('/sk') }}" class="header__language-dropdown-lang">SK</a>
                <a href="{{ url('/ru') }}" class="header__language-dropdown-lang">RU</a>
            </div>
        </div>

        <div class="header__burger-icon" onclick="toggleBurgerMenu()">
            <img src="/media/icons/burger_menu.svg" alt="" width="32" height="32" class="header__burger-icon-close">
            <img src="/media/icons/close_menu.svg" alt="" width="32" height="32" class="header__burger-icon-open">
        </div>

        <div class="header__burger-menu">
            <div class="header__burger-menu-links">
                <a href="" class="header__burger-menu-links-link">
                    Про академію
                </a>
                <a href="" class="header__burger-menu-links-link">
                    Курси
                </a>
                <a href="" class="header__burger-menu-links-link">
                    Контакти
                </a>
            </div>

            <div class="header__burger-menu-languages">
                <span class="header__burger-menu-languages-lang">
                    SK
                </span>
                <span class="header__burger-menu-languages-lang">
                    RU
                </span>
            </div>

            <button class="header__burger-menu-button default-button">
                Безкоштовний урок
            </button>
        </div>
    </div>
</div>
