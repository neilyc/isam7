;(function(window) {
  'use strict';
  var modal, modalImg, close, self;
  function Modal(elem, options) {
    self = this;
    self.elem = elem;
    self._init();
    self.options = extend( self.defaults, options );

    var items = document.querySelectorAll(self.elem);
    Array.prototype.forEach.call(items, function(item) {
      item.addEventListener('click', self._open);
    }, self);

    modal.addEventListener('click', self._close);
  };
  Modal.prototype = {
    defaults : {},
    _init : function() {
      modal = document.createElement("div");
      modal.className = "gallery-modal";

      close = document.createElement("span");
      close.className = "close";
      close.innerHTML = "&times;";

      modalImg = document.createElement("img");
      modalImg.className = "gallery-modal-content";

      modal.appendChild(close);
      modal.appendChild(modalImg);
      document.body.appendChild(modal);    
    },
    _open : function() {
      var currentImg = this.querySelector('.img');

      modal.style.display = "block";
      modalImg.src = currentImg.src;
    },
    _close : function() {
      modal.style.display = "none";
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
  window.Modal = Modal;

})(window);