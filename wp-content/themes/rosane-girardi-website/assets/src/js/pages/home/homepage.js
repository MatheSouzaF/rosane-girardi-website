function swiper() {
  var slider1 = new Swiper('.slider1', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: 'fade',
    autoplay: {
      delay: 1800,
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
}
function initPage() {
  swiper();
}

export {initPage};
