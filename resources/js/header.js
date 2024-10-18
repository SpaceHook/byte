const languageSelector = document.querySelector('.header__language');
const dropdown = document.querySelector('.header__language-dropdown');
const currentContainer = document.querySelector('.header__language-current');
const currentLanguage = document.querySelector('.header__language-current-name');
const languageLinks = document.querySelectorAll('.header__language-dropdown-lang');
const closedBurger = document.querySelector('.header__burger-icon-close');
const openedBurger = document.querySelector('.header__burger-icon-open');
const burgerMenu = document.querySelector('.header__burger-menu');

window.burgerOpen = false;
const setLanguageFromURL = () => {
    const urlSegments = window.location.pathname.split('/'); // Розділяємо URL
    const locale = urlSegments[1];
    let language = 'UA';

    if (locale === 'sk') {
        language = 'SK';
    } else if (locale === 'ru') {
        language = 'RU';
    }

    currentLanguage.innerText = language;
}

document.addEventListener('DOMContentLoaded', () => {
    setLanguageFromURL();
});

languageSelector.addEventListener('mouseover', () => {
    dropdown.style.display = 'flex';
    currentContainer.classList.add('header__language-current--active');
});

languageSelector.addEventListener('mouseout', () => {
    dropdown.style.display = 'none';
    currentContainer.classList.remove('header__language-current--active');
});

languageLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        currentLanguage.innerText = event.target.innerText;

        window.location.href = event.target.href;
    });
});

window.toggleBurgerMenu = () => {
    window.burgerOpen = !burgerOpen;
    closedBurger.style.display = burgerOpen ? 'none' : 'block'
    openedBurger.style.display = burgerOpen ? 'block' : 'none'
    burgerMenu.style.display = burgerOpen ? 'flex' : 'none'
    document.body.classList.toggle('modal-open')
}
