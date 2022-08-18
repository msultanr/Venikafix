// Navbar Scroll
const navbar = document.getElementsByTagName('nav')[0];
window.addEventListener('scroll', function() {
  console.log(window.scrollY);
  if (window.scrollY > 1) {
    navbar.classList.replace('bg-transparent', 'nav-color')
  }
  else if (this.window.scrollY <= 0) {
    navbar.classList.replace('nav-color', 'bg-transparent')
  }
}); 

// Swiper Testimoni
var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,
  spaceBetween: 25,
  loop: true,
  centerSlide: 'true',
  fade: 'true',
  grabCursor: 'true',
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints:{
      0: {
          slidesPerView: 1,
      },
      // 520: {
      //     slidesPerView: 2,
      // },
      // 950: {
      //     slidesPerView: 3,
      // },
  },
});

