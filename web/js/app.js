;(function(window) {
  'use strict';
  var modal, modalImg, close;
  function App(elem, options) {
    this.elem = elem;
    this._init();
  };
  App.prototype = {
    defaults : {},
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
  function extend( a, b ) {
    for( var key in b ) { 
      if( b.hasOwnProperty( key ) ) {
        a[key] = b[key];
      }
    }
    return a;
  }
  window.App = App;

})(window);