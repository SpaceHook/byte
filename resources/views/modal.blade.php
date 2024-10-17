<div id="modal" class="modal">
    <div class="modal__container" data-modal-type="lesson">
        <img src="/media/images/modal_free_lesson.png" alt="" class="modal__image">

        <div class="modal__content">
            <img src="/media/icons/triangle.svg" alt="" class="modal__triangle">
            <img src="/media/icons/close_menu.svg" alt="" class="modal__close">
            <h3 class="modal__title">
                Хочете отримати безкоштовний урок?
            </h3>

            <p class="modal__description">
                Просто заповніть форму і отримаєте безкоштовне пробне заняття в академії BYTE!
            </p>

            <div class="modal__form">
                @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => 'Отримати безкоштовне заняття'])
            </div>

            <div class="modal__contact">
                <span class="modal__contact-text">
                    Або зв'яжіться з нами самостійно
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
        <img src="/media/images/modal_free_consultation.png" alt="" class="modal__image">

        <div class="modal__content">
            <img src="/media/icons/triangle.svg" alt="" class="modal__triangle">
            <img src="/media/icons/close_menu.svg" alt="" class="modal__close">
            <h3 class="modal__title">
                Отримайте безкоштовну консультацію прямо зараз!
            </h3>

            <p class="modal__description">
                Просто заповніть форму і отримаєте безкоштовне пробне заняття в академії BYTE!
            </p>

            <div class="modal__form">
                @include('form', ['fields' => ['name', 'email', 'phone'], 'buttonText' => 'Отримати безкоштовну консультацію'])
            </div>

            <div class="modal__contact">
                <span class="modal__contact-text">
                    Або зв'яжіться з нами самостійно
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
</div>
