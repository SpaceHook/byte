const languageSelector = document.querySelector('.header__language');
const dropdown = document.querySelector('.header__language-dropdown');
const currentContainer = document.querySelector('.header__language-current');
const closedBurger = document.querySelector('.header__burger-icon-close');
const openedBurger = document.querySelector('.header__burger-icon-open');
const burgerMenu = document.querySelector('.header__burger-menu');

window.burgerOpen = false;

languageSelector.addEventListener('mouseover', () => {
    dropdown.style.display = 'flex';
    currentContainer.classList.add('header__language-current--active')
});

languageSelector.addEventListener('mouseout', () => {
    dropdown.style.display = 'none';
    currentContainer.classList.remove('header__language-current--active')
});


window.toggleBurgerMenu = () => {
    window.burgerOpen = !burgerOpen;
    closedBurger.style.display = burgerOpen ? 'none' : 'block'
    openedBurger.style.display = burgerOpen ? 'block' : 'none'
    burgerMenu.style.display = burgerOpen ? 'flex' : 'none'
    document.body.classList.toggle('modal-open')
}

