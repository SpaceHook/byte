import './header.js';
import './modal.js';

window.scrollToSection = (sectionId) => {
    const section = document.getElementById(sectionId)
    if (section) {
        section.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
    }

    if (burgerOpen) {
        toggleBurgerMenu()
    }
}
