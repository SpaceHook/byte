@vite(['resources/js/banner_section.js', 'resources/css/main_page/banner_section.scss'])

<div class="banner-section__content container">
    <div class="swiper banner-section__swiper">
        <div class="swiper-wrapper banner-section__swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide banner-section__swiper-slide">
                    <picture>
                        <source srcset="{{ asset('storage/' . $banner->translation()?->image_mob) }}" media="(max-width: 768px)" />
                        <img src="{{ asset('storage/' . $banner->translation()?->image) }}" alt="" class="banner-section__swiper-slide-image">
                    </picture>
                </div>
            @endforeach
        </div>
    </div>

    <div class="banner-section__swiper-navigation">
        <button class="swiper-button-prev banner-section__swiper-navigation-button">
            <img src="/media/icons/arrow_left.svg" alt="">
        </button>
        <div class="swiper-pagination banner-section__swiper-pagination"></div>
        <button class="swiper-button-next banner-section__swiper-navigation-button">
            <img src="/media/icons/arrow_right.svg" alt="">
        </button>
    </div>
</div>
