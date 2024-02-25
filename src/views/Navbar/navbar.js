document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('nav_check');
    const navMenu = document.querySelector('#nav');

    // Ferme le menu lorsque l'on clique en dehors de celui-ci
    document.addEventListener('click', function(event) {
        if (!navMenu.contains(event.target) && !navToggle.contains(event.target)) {
            navMenu.classList.remove('show');
        }
    });

    // Ferme le menu lorsque l'on clique sur un lien
    navMenu.addEventListener('click', function() {
        navMenu.classList.remove('show');
    });

    // Ferme le menu lorsque l'on clique sur l'icône hamburger
    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('show');
    });
});
