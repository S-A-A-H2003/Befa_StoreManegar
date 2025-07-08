document.addEventListener('DOMContentLoaded', () => {
    const actionsDropdownButton = document.getElementById('actionsDropdownButton');
    const actionsDropdown = document.getElementById('actionsDropdown');

    if (actionsDropdownButton && actionsDropdown) {
        actionsDropdownButton.addEventListener('click', function () {
            actionsDropdown.classList.toggle('hidden');
        });
    }
});
