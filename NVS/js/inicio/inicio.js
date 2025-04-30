const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('navMenu');

// Toggle para abrir/cerrar el menú
hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
});

// Cerrar el menú al hacer clic fuera del nav o ul
document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !hamburger.contains(e.target)) {
        navMenu.classList.remove('active');
    }
});