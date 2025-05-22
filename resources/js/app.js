import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

///Botn de scroll hacia arriba
document.addEventListener("DOMContentLoaded", function () {
    const scrollToTopBtn = document.getElementById("scroll-top");

    if (scrollToTopBtn) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                scrollToTopBtn.style.opacity = 1;
            } else {
                scrollToTopBtn.style.opacity = 0;
            }
        });

        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }
});
