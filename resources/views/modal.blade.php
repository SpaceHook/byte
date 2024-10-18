<div id="modal" class="modal">
    <div class="modal__container" data-modal-type="lesson">
        <img src="/media/images/modal_free_lesson.png" alt="" width="570" height="700" class="modal__image">

        <div class="modal__content">
            <img src="/media/icons/triangle.svg" alt="" class="modal__triangle">
            <img src="/media/icons/close_menu.svg" alt="" class="modal__close">
            <h3 class="modal__title">
                @lang('modal.title1')
            </h3>

            <p class="modal__description">
                @lang('modal.sub_title1')
            </p>

            <div class="modal__form">
                @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => __('buttons.button_6')])
            </div>

            <div class="modal__contact">
                <span class="modal__contact-text">
                    @lang('modal.contact')
                </span>

                <div class="modal__contact-phone">
                    <img src="/media/icons/phone.svg" alt="" width="24" height="24" class="modal__contact-phone-icon">
                    <a href="tel:0675102244" class="modal__contact-phone-text">
                        (067) 510 22 44
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal__container" data-modal-type="consultation">
        <img src="/media/images/modal_free_consultation.png" alt="" width="570" height="700" class="modal__image">

        <div class="modal__content">
            <img src="/media/icons/triangle.svg" alt="" class="modal__triangle">
            <img src="/media/icons/close_menu.svg" alt="" class="modal__close">
            <h3 class="modal__title">
                @lang('modal.title2')
            </h3>

            <p class="modal__description">
                @lang('modal.sub_title1')
            </p>

            <div class="modal__form">
                @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => __('buttons.button_5')])
            </div>

            <div class="modal__contact">
                <span class="modal__contact-text">
                    @lang('modal.contact')
                </span>

                <div class="modal__contact-phone">
                    <img src="/media/icons/phone.svg" alt="" width="24" height="24" class="modal__contact-phone-icon">
                    <a href="tel:0675102244" class="modal__contact-phone-text">
                        (067) 510 22 44
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal__container modal__container-success" data-modal-type="success">
        <div class="modal__content">
            <img src="/media/icons/close_menu.svg" alt="" class="modal__close">
            <img src="/media/icons/byte_logo.svg" alt="" width="172" height="46" class="modal__logo">

            <h5 class="modal__big-title">
                @lang('modal.title3')
            </h5>

            <img src="/media/icons/heart.svg" alt="" width="32" height="32" class="modal__heart">

            <p class="modal__text">
                @lang('modal.sub_title2')
            </p>
        </div>
    </div>
</div>
