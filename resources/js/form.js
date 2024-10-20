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

document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('submit', function (event) {
        const form = event.target;

        // Переконайтеся, що форма має потрібний клас
        if (form.classList.contains('form')) {
            event.preventDefault();
            const formData = new FormData(form);

            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                return;
            }
            const csrfToken = csrfTokenMeta.getAttribute('content');

            const actionUrl = form.getAttribute('action'); // Отримуємо action з атрибута форми

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        openModal('success')
                    }
                })
                .catch(error => {
                    console.log(error)
                });
        }
    });
});
