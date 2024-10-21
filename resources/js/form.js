let selectedNumber = '+380'


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
    selectedNumber = item.querySelector('.form__fields-field-selector-dropdown-number').innerText;
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
    event.preventDefault();

    const form = event.target;
    const fieldsWithName = [...form.querySelectorAll('[name]')];
    const regEx = /^\d{9}$/;
    let hasError = false;
    let name = ''
    let surname = ''
    let email = ''
    let phone = ''

    fieldsWithName.shift();

    console.log(fieldsWithName)

    fieldsWithName.forEach(field => {

        switch (field.name) {
            case 'name':
                name = field.value;
                break
            case 'surname':
                surname = field.value;
                break
            case 'email':
                email = field.value;
                break
            case 'phone':
                phone = selectedNumber + field.value;
                break
        }
    })

    if (hasError) {
        return;
    }


    if (form.classList.contains('form')) {
        const formData = {
            name: name,
            surname: surname,
            email: email,
            phone: phone,
        };
        const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
        if (!csrfTokenMeta) {
            return;
        }
        const csrfToken = csrfTokenMeta.getAttribute('content');

        const actionUrl = form.getAttribute('action');

        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
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
