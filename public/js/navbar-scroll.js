// Hide navbar when scrolling down, show when scrolling up
(function() {
    const navbar = document.querySelector('.cyberpunk-navbar');
    if (!navbar) return;

    let lastScrollY = window.scrollY;
    let ticking = false;
    const threshold = 10; // min px change to toggle

    function onScroll() {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(() => {
            const currentY = window.scrollY;

            // If the bootstrap collapse is open, keep navbar visible
            const collapse = document.querySelector('.navbar-collapse.show');
            if (collapse) {
                navbar.classList.remove('navbar-hidden');
                lastScrollY = currentY;
                ticking = false;
                return;
            }

            if (Math.abs(currentY - lastScrollY) < threshold) {
                ticking = false;
                return;
            }

            if (currentY > lastScrollY && currentY > 50) {
                // scrolling down
                navbar.classList.add('navbar-hidden');
            } else {
                // scrolling up
                navbar.classList.remove('navbar-hidden');
            }

            lastScrollY = currentY;
            ticking = false;
        });
    }

    window.addEventListener('scroll', onScroll, { passive: true });

    // also toggle on resize in case layout changes
    window.addEventListener('resize', () => {
        navbar.classList.remove('navbar-hidden');
    });
})();
