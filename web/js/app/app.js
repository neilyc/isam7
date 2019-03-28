;(function(window) {
  var self;
  function App() {
    self = this;
    self._init();
  };
  App.prototype = {
    _init: function() {   
      document.querySelector('.toggle-nav').addEventListener('click', function(e) {
        document.querySelector('.topnav').classList.toggle("responsive");
      });

      if(document.querySelector('.gallery_view')) {
        self._initGallery();
      }
      
      if(document.querySelector('.blog')) {
        self._initBlog();
      }

      window.onload = function() {
        self._menuCheckActive();
        document.body.removeChild(document.querySelector('.preloader'));
      }
    },
    _initGallery: function() {
      new AnimOnScroll(document.getElementById('grid'), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
      });

      new Modal('.img');
    },
    _initBlog: function() {
      new Swiper('.swiper-container', {
        slidesPerView: 4,
        paginationClickable: true,
        spaceBetween: 15,
        preventClicks: false,
        pagination: '.swiper-pagination',
        simulateTouch: false
      });

      new Modal('.img');
    },
    _menuCheckActive: function() {
      var urlMatch = false,
          path = decodeURIComponent(window.location.pathname),
          href;

      Array.prototype.forEach.call(document.querySelectorAll('.topnav li a'), function (elem) {
        href = elem.getAttribute('href');
        if (path.substring(0, href.length) === href && href != '/') {
          elem.classList.add('current');
        }
      });
    }
  }
  window.App = App;

})(window);