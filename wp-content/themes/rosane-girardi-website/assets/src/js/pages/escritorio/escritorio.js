function initStart() {
  $(document).ready(function () {
    function startMarquee() {
      const $marquee = $('.marquee');
      const containerWidth = $('.marquee-container').width();
      const textWidth = $marquee.width();

      let startPosition = 0;
      let endPosition = -textWidth / 2;

      function animateMarquee() {
        $marquee.css({left: startPosition});
        $marquee.animate({left: endPosition}, 10000, 'linear', function () {
          $marquee.css({left: containerWidth});
          animateMarquee();
        });
      }

      animateMarquee();
    }

    startMarquee();
  });
}

export {initStart};
