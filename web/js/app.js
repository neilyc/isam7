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

      new Modal('.grid-item');
    },
    _initBlog : function() {
      new Modal('.thumbnail');
    }
  }
  window.App = App;

})(window);