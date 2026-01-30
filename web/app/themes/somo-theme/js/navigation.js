/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens.
 */
(function () {
    const siteNavigation = document.getElementById('site-navigation');
    const menuToggle = document.querySelector('.menu-toggle');

    if (!siteNavigation || !menuToggle) {
        return;
    }

    menuToggle.addEventListener('click', function () {
        siteNavigation.classList.toggle('toggled');
        menuToggle.classList.toggle('is-active');
        document.body.classList.toggle('menu-open');

        if (menuToggle.getAttribute('aria-expanded') === 'true') {
            menuToggle.setAttribute('aria-expanded', 'false');
        } else {
            menuToggle.setAttribute('aria-expanded', 'true');
        }
    });
}());
