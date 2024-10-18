window.toggleDropdownMenu = (dropdown, event) => {
    event.stopPropagation(); // Зупиняємо поширення події

    document.querySelectorAll('.form__fields-field-selector-dropdown-menu--active').forEach(menu => {
        if (menu !== dropdown.querySelector('.form__fields-field-selector-dropdown-menu')) {
            menu.classList.remove('form__fields-field-selector-dropdown-menu--active');
        }
    });

    const dropdownMenu = dropdown.querySelector('.form__fields-field-selector-dropdown-menu');
    dropdownMenu.classList.toggle('form__fields-field-selector-dropdown-menu--active');

    if (dropdownMenu.classList.contains('form__fields-field-selector-dropdown-menu--active')) {
        document.addEventListener('click', handleClickOutside);
    }
};

window.selectDropdownItem = (item, event) => {
    event.stopPropagation();

    const dropdown = item.closest('.form__fields-field-selector-dropdown');
    const selectedNumber = item.querySelector('.form__fields-field-selector-dropdown-number').innerText;
    const selectedFlag = item.querySelector('.form__fields-field-selector-dropdown-icon').getAttribute('src');

    dropdown.querySelector('.form__fields-field-selector-dropdown-number').innerText = selectedNumber;
    dropdown.querySelector('.form__fields-field-selector-dropdown-icon').setAttribute('src', selectedFlag);

    dropdown.querySelector('.form__fields-field-selector-dropdown-menu').classList.remove('form__fields-field-selector-dropdown-menu--active');

    document.removeEventListener('click', handleClickOutside);
}

function handleClickOutside(event) {
    const activeDropdown = document.querySelector('.form__fields-field-selector-dropdown-menu--active');
    if (activeDropdown && !activeDropdown.closest('.form__fields-field-selector-dropdown').contains(event.target)) {
        activeDropdown.classList.remove('form__fields-field-selector-dropdown-menu--active');
        document.removeEventListener('click', handleClickOutside);
    }
}

document.addEventListener('submit', function (event) {
    const form = event.target;

    if (form.classList.contains('form')) {
        event.preventDefault();
        openModal('success')
    }
});
