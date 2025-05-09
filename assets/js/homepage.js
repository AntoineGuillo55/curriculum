document.addEventListener("turbo:load", () => {
    const previousBtn = document.querySelector(".previous");
    const nextBtn = document.querySelector(".next");
    const overflowDiv = document.querySelector(".overflow");
    const articles = document.querySelectorAll(".overflow article");

    let currentIndex = 0;

    function getArticleWidth() {
        return articles[0].offsetWidth + 10; // largeur + gap (10px)
    }

    function getMaxIndex() {
        const containerWidth = overflowDiv.parentElement.offsetWidth;
        return Math.max(0, articles.length - Math.floor(containerWidth / getArticleWidth()));
    }

    function updateCarousel() {
        const articleWidth = getArticleWidth();
        const maxIndex = getMaxIndex();
        currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
        overflowDiv.style.transform = `translateX(-${currentIndex * articleWidth}px)`;
    }

    // Navigation boutons (desktop)
    if (nextBtn && previousBtn) {
        nextBtn.addEventListener("click", () => {
            currentIndex++;
            updateCarousel();
        });

        previousBtn.addEventListener("click", () => {
            currentIndex--;
            updateCarousel();
        });
    }

    // Navigation swipe (mobile)
    let startX = 0;
    let isSwiping = false;

    overflowDiv.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
        isSwiping = true;
    });

    overflowDiv.addEventListener("touchmove", (e) => {
        if (!isSwiping) return;
        const currentX = e.touches[0].clientX;
        const diffX = startX - currentX;

        if (Math.abs(diffX) > 50) { // Seuil de swipe
            if (diffX > 0) {
                currentIndex++;
            } else {
                currentIndex--;
            }
            updateCarousel();
            isSwiping = false;
        }
    });

    // Mise à jour au redimensionnement
    window.addEventListener("resize", updateCarousel);

    // Initialisation
    updateCarousel();

    const pizzaBtn = document.getElementById("get-pizza");
    const pizzaImg = document.getElementById("pizza");

    if (pizzaBtn && pizzaImg) {
        pizzaBtn.addEventListener('click', () => {
            pizzaImg.classList.remove("pizza-roll");
            void pizzaImg.offsetWidth;
            pizzaImg.classList.add("pizza-roll");
        });
    }
});