
import '../css/app.scss';

document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez les éléments
    var auth = document.querySelector('.navbar-auth');
    var authDropdown = document.querySelector('.navbar-auth-dropdown');
    var isDropdownOpen = false;

    auth.addEventListener('click', function (e) {
        e.preventDefault();

        if (!e.target.closest('.navbar-auth-dropdown')) {
            authDropdown.classList.toggle('show');
            isDropdownOpen = !isDropdownOpen;
        }
    });

    document.addEventListener('click', function (e) {
        var target = e.target;
        if (isDropdownOpen && !target.closest('.navbar-auth') && !target.closest('.navbar-auth-dropdown')) {
            authDropdown.classList.remove('show');
            isDropdownOpen = false;
        }
    });
});