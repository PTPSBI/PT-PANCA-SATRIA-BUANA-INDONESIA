document.addEventListener("DOMContentLoaded", function () {
  // Init AOS
  AOS.init({
    duration: 800,
    once: true,
    easing: "ease-in-out"
  });

  // Smooth scroll for navbar links
  const links = document.querySelectorAll(".navbar-nav a.nav-link");
  links.forEach(link => {
    link.addEventListener("click", function (e) {
      const targetId = this.getAttribute("href").slice(1);
      const targetEl = document.getElementById(targetId);
      if (targetEl) {
        e.preventDefault();
        targetEl.scrollIntoView({ behavior: "smooth" });
      }
    });
  });
});
