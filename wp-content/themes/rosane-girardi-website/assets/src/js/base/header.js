function scrollsmooth() {
  gsap.registerPlugin(ScrollTrigger);

  const lenis = new Lenis({
    lerp: 0.07,
  });

  lenis.on('scroll', ScrollTrigger.update);

  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });
}
function menuSticy() {
  $('#btn-active')
    .off('click')
    .on('click', function () {
      $('#btn-active').toggleClass('active-btn');
      $('.sidebar').toggleClass('active-sidebar');
    });

  $('.sidebar a')
    .off('click')
    .on('click', function () {
      $('#btn-active').removeClass('active-btn');
      $('.sidebar').removeClass('active-sidebar');
    });

  window.onscroll = function () {
    var header = document.querySelector('nav');
    if (window.pageYOffset > 0) {
      header.classList.add('sticky');
    } else {
      header.classList.remove('sticky');
    }
  };

  $('.link-hover')
    .off('click')
    .on('click', function (e) {
      e.preventDefault();
      var target = this.hash;
      var $target = $(target);
      $('html, body')
        .stop()
        .animate(
          {
            scrollTop: $target.offset().top - 150,
          },
          900,
          'swing'
        );
    });
}
function initHeader() {
  menuSticy();
  scrollsmooth();
}

export {initHeader};
