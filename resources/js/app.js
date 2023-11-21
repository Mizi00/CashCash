
import '../css/app.scss';

document.addEventListener('DOMContentLoaded', () => {
    // Sélectionnez les éléments
    var auth = document.querySelector('.navbar-auth > a');
    if (auth) {
        var authDropdown = document.querySelector('.navbar-auth-dropdown');
        var isDropdownOpen = false;

        auth.addEventListener('click', (e) => {
            e.preventDefault();

            if (!e.target.closest('.navbar-auth-dropdown')) {
                authDropdown.classList.toggle('show');
                isDropdownOpen = !isDropdownOpen;
            }
        });

        document.addEventListener('click', (e) => {
            var target = e.target;
            if (isDropdownOpen && !target.closest('.navbar-auth') && !target.closest('.navbar-auth-dropdown')) {
                authDropdown.classList.remove('show');
                isDropdownOpen = false;
            }
        });
    }
});

// Sidebar responsive javascript events
const sidebar = document.querySelector('.sidebar');
const navbarMenu = document.getElementById('navbar-menu');
const mask = document.getElementById('mask');
if (sidebar && navbarMenu && mask) {
    navbarMenu.addEventListener('click', () => {
        sidebar.classList.add('show');
        mask.classList.toggle('show', sidebar.classList.contains('show'));
        document.body.classList.toggle('overflow-hidden', sidebar.classList.contains('show'));
    });
    mask.addEventListener('click', () => {
        sidebar.classList.remove('show');
        mask.classList.remove('show');
        document.body.classList.remove('overflow-hidden');
    });
}