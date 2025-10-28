
        // Scroll to top button functionality with progress indicator
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        const progressRing = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        const progressCircle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');

        // Setup progress ring
        progressRing.setAttribute('class', 'absolute inset-0 -rotate-90');
        progressRing.setAttribute('width', '48');
        progressRing.setAttribute('height', '48');

        progressCircle.setAttribute('cx', '24');
        progressCircle.setAttribute('cy', '24');
        progressCircle.setAttribute('r', '20');
        progressCircle.setAttribute('stroke', 'currentColor');
        progressCircle.setAttribute('stroke-width', '3');
        progressCircle.setAttribute('fill', 'none');
        progressCircle.setAttribute('class', 'text-white/30');
        progressCircle.setAttribute('stroke-dasharray', '125.6');
        progressCircle.setAttribute('stroke-dashoffset', '125.6');

        progressRing.appendChild(progressCircle);
        scrollToTopBtn.appendChild(progressRing);

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            const drawValue = (125.6 * scrollPercent) / 100;

            progressCircle.setAttribute('stroke-dashoffset', 125.6 - drawValue);

            if (scrollTop > 300) {
                scrollToTopBtn.classList.remove('hidden');
                scrollToTopBtn.classList.add('flex');
            } else {
                scrollToTopBtn.classList.add('hidden');
                scrollToTopBtn.classList.remove('flex');
            }
        });
