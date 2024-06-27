import { TweenMax, Expo } from 'gsap/TweenMax';

class GetinTouch {
  init() {
    this.GitFirstSlide();
    this.GitSecondSlide();
    this.GitThirdSlide();
  }

  GitFirstSlide() {
    $('.git-top-list').slick({
      dots: false,
      infinite: true,
      speed: 4000,
      cssEase: 'linear',
      slidesToShow: 2,
      autoplaySpeed: 0,
      slidesToScroll: 1,
      variableWidth: true,
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

  GitSecondSlide() {
    $('.git-bot-list').slick({
      dots: false,
      infinite: true,
      autoplay: true,
      speed: 4000,
      cssEase: 'linear',
      slidesToShow: 2,
      autoplaySpeed: 0,
      rtl: true,
      variableWidth: true,
      draggable: false,
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

  GitThirdSlide() {
    $('.git-right-img').slick({
        dots: false,
        slidesToScroll: 1,
        verticalSwiping: true,
        vertical: true,
        arrows: true,
        draggable: false,
        nextArrow: '.git-arrow',
        cssEase: 'linear',
        adaptiveHeight: true
     });
  }

  
}

$(document).ready(() => {
  if ($('.block--custom-layout__git').length) {
    let _module = new GetinTouch($('.block--custom-layout__git'));
    _module.init();
  }
});
