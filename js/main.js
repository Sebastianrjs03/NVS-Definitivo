document.addEventListener('DOMContentLoaded', () => {
    const elementosCarousel = document.querySelectorAll('.carousel');
    M.Carousel.init(elementosCarousel, {
        duration: 200,
        dist: -80,
        shift: 20,
        padding: 5,
        numVisible: 5

    });
});