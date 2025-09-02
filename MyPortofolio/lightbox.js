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

      navigator.clipboard.writeText(text)
        .then(() => {
          // Create a temporary "Copied!" message next to the clicked item
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
    });
  });

});
