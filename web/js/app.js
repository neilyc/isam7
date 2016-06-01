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
    },
    _initGallery : function() {
      new AnimOnScroll(document.getElementById('grid'), {
        minDuration : 0.4,
        maxDuration : 0.7,
        viewportFactor : 0.2
      });

      new Modal('.grid-item');
    }
  }
  window.App = App;

})(window);