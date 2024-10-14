import Swiper from "swiper";
import 'swiper/css';
import 'swiper/css/pagination'
import {Navigation, Pagination} from "swiper/modules";

const swiper = new Swiper('.banner-section__swiper', {
    loop: true,
    modules: [Navigation, Pagination],
    pagination: {
        el: '.swiper-pagination',
    },

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
