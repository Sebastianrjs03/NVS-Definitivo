const wrapper = document.querySelector(".contenedor-padre");
const carousel = document.querySelector(".contenedor-productos");
const arrowBtns = document.querySelectorAll(".contenedor-padre i");
const firstCardWidth = carousel.querySelector(".cards").offsetWidth;


// Botones de flechas (ignoran la clase inactivo)
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        const direction = btn.id === "left" ? -firstCardWidth : firstCardWidth;
        carousel.scrollLeft += direction;
    });
});