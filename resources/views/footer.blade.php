<div class="footer__content container">
    <img src="/media/images/footer_logo.png" alt="" class="footer__logo">

    <div class="footer__links">
        <button class="footer__links-link">
            @lang('navigation.about')
        </button>
        <button class="footer__links-link" onclick="scrollToSection('courses')">
            @lang('navigation.courses')
        </button>
        <button class="footer__links-link" onclick="scrollToSection('contacts')">
            @lang('navigation.contacts')
        </button>

        <a href="{{route('dogovor.open')}}" target="_blank" class="footer__links-link">@lang('navigation.contract')</a>
    </div>

    <div class="footer__section footer__section-socials">
        <h5 class="footer__section-title">
            @lang('main_page.we_online')
        </h5>

        <div class="footer__socials">
            <a href="" class="footer__socials-social">
                <img src="/media/icons/footer_instagram.svg" alt="" class="footer__socials-social-icon">
            </a>
            <a href="" class="footer__socials-social">
                <img src="/media/icons/footer_youtube.svg" alt="" class="footer__socials-social-icon">
            </a>
        </div>
    </div>

    <div class="footer__section footer__section-contact">
        <h5 class="footer__section-title">
            @lang('main_page.contact_us')
        </h5>

        <div class="footer__section-numbers">
            <a href="tel:+380675102244" class="footer__section-numbers-number">
                +38 (067) 510 22 44
            </a>
            <a href="tel:+380995102233" class="footer__section-numbers-number">
                +38 (099) 510 22 33
            </a>
        </div>
    </div>

    <div class="footer__copyright">
        @lang('main_page.copyright')
    </div>
</div>
