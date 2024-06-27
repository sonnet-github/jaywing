import { TweenMax, Expo } from 'gsap/TweenMax';

class Capabilities {
  init() {
    this.OCSlide();
  }

  OCSlide() {
    $('.oc-bot-list').slick({
      dots: false,
      infinite: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplaySpeed: 4500,
      draggable: true,
      autoplay: false,
      nextArrow: '.oc-arrow',
      asNavFor: '.oc-bg-list',
      focusOnSelect: true,
      pauseOnHover: false,
      arrows: true,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
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

   $('.oc-bg-list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.oc-bot-list',
        dots: false,
        arrows: false,
        fade: true,
        centerMode: false,
        focusOnSelect: false
    });

    jQuery('.oc-bot-item-inner').hover(
        function() {
            var currentID = jQuery(this).data('area-id');
            var target = jQuery('.oc-bg-hover-item[data-area-id="' + currentID + '"]');
            target.addClass('active');
        },
        function() {
            jQuery('.oc-bg-hover-item').removeClass('active');
        }
    );
  }
}

$(document).ready(() => {
  if ($('.block--custom-layout__oc').length) {
    let _module = new Capabilities($('.block--custom-layout__oc'));
    _module.init();
  }
});