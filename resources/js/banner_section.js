import Swiper from "swiper";
import 'swiper/css';
import 'swiper/css/pagination'
import {Navigation, Pagination, Autoplay} from "swiper/modules";

const swiper = new Swiper('.banner-section__swiper', {
    modules: [Navigation, Pagination, Autoplay],
    loop: true,
    autoplay: {
        delay: 5000,
    },

    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    spaceBetween: 20,
});
