document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.slider');
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    const slides = slider ? slider.querySelectorAll('img') : [];
    let currentIndex = 0;

    if (slider && slides.length > 0) {
        // Устанавливаем ширину слайдера
        slider.style.width = `${slides.length * 100}%`;

        function goToSlide(index) {
            if (index < 0) {
                index = slides.length - 1;
            } else if (index >= slides.length) {
                index = 0;
            }
            currentIndex = index;
            const offset = -currentIndex * (100 / slides.length);
            slider.style.transform = `translateX(${offset}%)`;
        }

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                goToSlide(currentIndex - 1);
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                goToSlide(currentIndex + 1);
            });
        }

        // Автоматическая смена слайдов
        setInterval(() => {
            goToSlide(currentIndex + 1);
        }, 5000); 

        goToSlide(0);
    }

    // Логика кнопки "Вверх"
    const scrollToTopButton = document.getElementById('scrollToTopButton');

    if (scrollToTopButton) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollToTopButton.style.display = 'block';
            } else {
                scrollToTopButton.style.display = 'none';
            }
        });

        scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});

// Логика полноэкранного просмотра изображения
function openFullscreenImage(imgElement) {
    const fullscreenContainer = document.getElementById('fullscreen-container');
    const fullscreenImage = document.getElementById('fullscreen-image');
    
    if (fullscreenContainer && fullscreenImage) {
        fullscreenImage.src = imgElement.src;
        fullscreenContainer.classList.add('visible');
    }
}

function closeFullscreenImage() {
    const fullscreenContainer = document.getElementById('fullscreen-container');
    if (fullscreenContainer) {
        fullscreenContainer.classList.remove('visible');
    }
}
