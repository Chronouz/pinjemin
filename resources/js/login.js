
    window.showContainer = function (type) {
        const container = document.getElementById('form-container');
        const signupForm = document.getElementById('signup-form');
        const loginForm = document.getElementById('login-form');
        const verifyEmailForm = document.getElementById('verify-email-form');

        // Reset forms
        signupForm.classList.add('hidden');
        loginForm.classList.add('hidden');
        verifyEmailForm.classList.add('hidden');

        // Show the appropriate form
        if (type === 'signup') {
            signupForm.classList.remove('hidden');
        } else if (type === 'login') {
            loginForm.classList.remove('hidden');
        } else if (type === 'verify-email') {
            verifyEmailForm.classList.remove('hidden');
        }

        // Show the container
        container.classList.remove('hidden');
        container.classList.remove('translate-x-full');
    }

    window.hideContainer = function() {
        const container = document.getElementById('form-container');
        container.classList.add('translate-x-full');
        setTimeout(() => {
            container.classList.add('hidden');
        }, 500); // Match the duration of the transition
    }

    // Smooth scroll to section
    document.querySelectorAll('.scroll-to-section').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Scroll animation for "Tentang Kami" section
    document.addEventListener("scroll", function () {
        const tentangKami = document.querySelector("#tentang-kami");
        const scrollY = window.scrollY;

        if (scrollY > 0) {
            tentangKami.style.transform = `translateY(${scrollY * -0.5}px)`;
        } else {
            tentangKami.style.transform = "translateY(0)";
        }
    });