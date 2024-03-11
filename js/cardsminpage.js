// JavaScript logic for slideshow
const cards = document.querySelectorAll('.card1');
const prevButton = document.getElementById('prev-button');
const nextButton = document.getElementById('next-button');
let currentIndex = 0;

function showCard(index) {
    cards.forEach((card, i) => {
        if (i === index) {
            card.classList.add('active');
        } else {
            card.classList.remove('active');
        }
    });
}

prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + cards.length) % cards.length;
    showCard(currentIndex);
});

nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % cards.length;
    showCard(currentIndex);
});

// Show the first card initially
showCard(currentIndex);


