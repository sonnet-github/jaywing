import { TweenMax, Expo } from 'gsap/TweenMax';

class brands {
  init() {
    this.Brandsslide();
  }

  Brandsslide() {
    $('.brand-logo-slide-inner').slick({
      dots: false,
      infinite: true,
      speed: 4000,
      cssEase: 'linear',
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplaySpeed: 0,
      draggable: false,
      autoplay: true,
      pauseOnFocus: false,
      arrows: false,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 5,
            centerMode: false,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 4,
            centerMode: false,
            slidesToScroll: 1,
          },
        }
      ],
   });
  }
}

$(document).ready(() => {
  if ($('.block--custom-layout__hero').length) {
    let _module = new brands($('.block--custom-layout__hero'));
    _module.init();
  }
});
