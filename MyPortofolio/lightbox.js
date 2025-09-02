document.addEventListener("DOMContentLoaded", () => {

  // ---------------- LIGHTBOX ----------------
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-img");
  const closeBtn = document.querySelector(".close");
  const galleryImages = document.querySelectorAll(".gallery img");

  if (lightbox && lightboxImg && closeBtn) {
    galleryImages.forEach((img) => {
      img.addEventListener("click", () => {
        lightbox.setAttribute("aria-hidden", "false");
        lightbox.style.display = "flex";
        lightboxImg.src = img.src;
      });
    });

    closeBtn.addEventListener("click", () => {
      lightbox.setAttribute("aria-hidden", "true");
      lightbox.style.display = "none";
    });

    lightbox.addEventListener("click", (e) => {
      if (e.target === lightbox) {
        lightbox.setAttribute("aria-hidden", "true");
        lightbox.style.display = "none";
      }
    });
  }

  // ---------------- COPY TO CLIPBOARD ----------------
const copyableItems = document.querySelectorAll('.copyable');

copyableItems.forEach(item => {
  item.addEventListener('click', () => {
    const text = item.dataset.copy;

    // Copy to clipboard
    navigator.clipboard.writeText(text)
      .then(() => {
        const message = document.createElement('span');
        message.textContent = ' Copied!';
        message.style.color = '#00e6cc';
        message.style.fontSize = '0.9rem';
        message.style.marginLeft = '5px';
        item.appendChild(message);

        setTimeout(() => {
          message.remove();
        }, 1500);
      })
      .catch(err => {
        console.error('Failed to copy: ', err);
      });

    // Open mail client for email
    if (item.dataset.copy.includes('@')) {
      window.location.href = `mailto:${item.dataset.copy}`;
    }

    // Open phone dialer for phone number
    if (/^\+?\d{6,15}$/.test(item.dataset.copy.replace(/\s/g, ''))) {
      // Remove spaces for tel: link
      const phoneNumber = item.dataset.copy.replace(/\s/g, '');
      window.location.href = `tel:${phoneNumber}`;
    }
  });
});

});
// ---------------- FLOATING IMAGES ----------------
const centerImg = document.querySelector('.about-me img[alt="Your Name"]');
const floatingImgs = document.querySelectorAll(".about-me img:not([alt='Your Name'])");

floatingImgs.forEach((img, index) => {
  // Start with a random angle but stagger each image to avoid overlap
  let angle = index * (360 / floatingImgs.length); 
  // Increase radius so they are further apart
  const baseRadius = 180 + index * 30;
  let paused = false;

  img.addEventListener('mouseenter', () => paused = true);
  img.addEventListener('mouseleave', () => paused = false);

  function orbit() {
    if (!paused) {
      angle += 0.3; // orbit speed
    }

    const rad = angle * (Math.PI / 180); 
    const centerX = centerImg.offsetLeft + centerImg.offsetWidth / 2;
    const centerY = centerImg.offsetTop + centerImg.offsetHeight / 2;

    const x = centerX + baseRadius * Math.cos(rad) - img.offsetWidth / 2;
    const y = centerY + baseRadius * Math.sin(rad) - img.offsetHeight / 2;

    img.style.left = `${x}px`;
    img.style.top = `${y}px`;

    requestAnimationFrame(orbit);
  }

  orbit();
});
