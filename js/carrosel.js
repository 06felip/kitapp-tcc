
// Objeto para rastrear os índices de cada carrossel
const carouselIndices = new Map();

document.querySelectorAll('.container-salas, .livros-recomenda').forEach((container) => {
    const carousel = container.querySelector('.carrosel');
    const items = carousel.querySelectorAll('.carousel-item');

    // Inicializa o índice para este carrossel
    carouselIndices.set(carousel, 0);

    // Botão anterior
    const prevButton = container.querySelector('.anterior');
    prevButton.addEventListener('click', () => {
        moveSlide(carousel, items, -1);
    });

    // Botão próximo
    const nextButton = container.querySelector('.proximo');
    nextButton.addEventListener('click', () => {
        moveSlide(carousel, items, 1);
    });
});

function moveSlide(carousel, items, direction) {
    const totalItems = items.length;
    let currentIndex = carouselIndices.get(carousel);

    // Calcula o novo índice
    currentIndex = (currentIndex + direction + totalItems) % totalItems;

    // Atualiza o índice no mapa
    carouselIndices.set(carousel, currentIndex);

    // Ajusta o deslocamento do carrossel
    const offset = -(currentIndex * (310 + 25)); // 310px é o tamanho do card, 25px é o gap
    carousel.style.transform = `translateX(${offset}px)`;

    // Adiciona transição suave
    carousel.style.transition = 'transform 0.5s ease';
}