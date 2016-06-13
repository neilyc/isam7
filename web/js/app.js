;(function(window) {
  'use strict';
  function App() {
    this._init();
  };
  App.prototype = {
    _init : function() {   
      window.onload = function() {
        document.body.removeChild(document.querySelector('.preloader'));
      }

      if(document.querySelector('.gallery')) {
        this._initGallery();
      }
      if(document.querySelector('.blog')) {
        this._initBlog();
      }
    },
    _initGallery : function() {
      new AnimOnScroll(document.getElementById('grid'), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
      });

      new Modal('.img');
    },
    _initBlog : function() {
      var modal = new Modal();
      var swiper = new Swiper ('.swiper-container', {
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 15,
        loop: true,
        preventClicks: false,
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
      }); 
      swiper.on('touchStart', function (s, e) {
        modal.open(e);
      });
    }
  }
  window.App = App;

})(window);