import { TweenMax, Expo } from 'gsap/TweenMax';

class Testimonials {
  init() {
    this.testiSlide();
  }

  testiSlide() {
    $('.testi-list').slick({
      dots: false,
      infinite: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplaySpeed: 4500,
      draggable: true,
      autoplay: false,
      nextArrow: '.testi-next',
      prevArrow: '.testi-prev',
      arrows: true,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            centerMode: false,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 767,
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
  if ($('.block--custom-layout__testi').length) {
    let _module = new Testimonials($('.block--custom-layout__testi'));
    _module.init();
  }
});
