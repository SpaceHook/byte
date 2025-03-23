@vite(['resources/css/main_page/contact_section.scss'])

<div class="contact-section__content container">
    <h2 class="contact-section__title">
        @lang('main_page.in_touch')
    </h2>

    <div class="contact-section__info">
        <div class="contact-section__info-image">
            <img src="/media/images/contact_items.png" alt="" width="222" height="186" class="contact-section__info-image-photo">
        </div>

        <div class="contact-section__info-options">
            <div class="contact-section__info-options-option">
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <h5 class="contact-section__info-options-option-title">
                    @lang('main_page.contact_us')
                </h5>

                <div class="contact-section__info-options-option-items">
                    <div class="contact-section__info-options-option-items-item">
                        <a href="tel:+421952279887" class="contact-section__info-options-option-items-item-text">
                            +421 (952) 27 98 87
                        </a>
                    </div>
                    <div class="contact-section__info-options-option-items-item">
                        <img src="/media/icons/mail.svg" alt="" width="32" height="32" class="contact-section__info-options-option-items-item-icon">
                        <a href="mailto:Byte.bratislava@gmail.com" class="contact-section__info-options-option-items-item-text">
                            Byte.bratislava@gmail.com
                        </a>
                    </div>
                </div>
            </div>
            <div class="contact-section__info-options-option">
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <h5 class="contact-section__info-options-option-title">
                    @lang('main_page.we_online')
                </h5>

                <div class="contact-section__info-options-option-socials">
                    <a href="https://www.facebook.com/share/15ufPhuPY3/?mibextid=wwXIfr" target="_blank" class="contact-section__info-options-option-socials-social">
                        <img src="/media/icons/facebook.svg" alt="" width="40" height="40" class="contact-section__info-options-option-socials-social-icon">
                    </a>
                    <a href="https://www.instagram.com/it.byte.academy?igsh=MWN0aTc3c3FnM201ag==" target="_blank" class="contact-section__info-options-option-socials-social">
                        <img src="/media/icons/instagram.svg" alt="" width="40" height="40" class="contact-section__info-options-option-socials-social-icon">
                    </a>
                </div>
            </div>
            <div class="contact-section__info-options-option">
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <div class="contact-section__info-options-option-block"></div>
                <h5 class="contact-section__info-options-option-title">
                    @lang('main_page.visit_us')
                </h5>

                <div class="contact-section__info-options-option-items">
                    <div class="contact-section__info-options-option-items-item">
                        <img src="/media/icons/map_point.svg" alt="" width="24" height="24" class="contact-section__info-options-option-items-item-icon">
                        <a href="https://maps.app.goo.gl/jJoncNGLWYRKxjrR7" target="_blank" class="contact-section__info-options-option-items-item-text">
                            Tupolevova 1, Bratislava, 851 01
                        </a>
                    </div>
                    <div class="contact-section__info-options-option-items-item">
                        <img src="/media/icons/cloak.svg" alt="" width="24" height="24" class="contact-section__info-options-option-items-item-icon">
                        <span class="contact-section__info-options-option-items-item-text">
                            @lang('main_page.work_time')
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
