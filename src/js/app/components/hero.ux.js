import { TweenMax, Expo } from 'gsap/TweenMax';

class HeroSlide {
  init() {
    this.HeroLogoSlide();
  }

  HeroLogoSlide() {
    $('.hero-logo-slide-inner').slick({
      dots: false,
      infinite: true,
      speed: 4000,
      cssEase: 'linear',
      slidesToShow: 6,
      autoplaySpeed: 0,
      slidesToScroll: 1,
      draggable: false,
      autoplay: true,
      pauseOnFocus: false,
      arrows: false,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            centerMode: false,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 481,
          settings: {
            slidesToShow: 1,
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
    let _module = new HeroSlide($('.block--custom-layout__hero'));
    _module.init();
  }
});
