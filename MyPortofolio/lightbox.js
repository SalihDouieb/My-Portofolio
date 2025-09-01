document.addEventListener("DOMContentLoaded", () => {
  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-img");
  const closeBtn = document.querySelector(".close");
  const galleryImages = document.querySelectorAll(".gallery img");

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
});
