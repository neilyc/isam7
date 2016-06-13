;(function(window) {
  'use strict';
  var modal, modalImg, close, self;
  function Modal(elem, options) {
    self = this;
    self.elem = elem;
    self._init();
    self.options = extend( self.defaults, options );

    if(self.elem) {;
      Array.prototype.forEach.call(document.querySelectorAll(self.elem), function(item) {
        item.addEventListener('click', self._open);
      });
    }

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
    _open : function(e) {
      modalImg.src = e.target.src;
      modal.style.display = "block";  
    },
    _close : function() {
      modal.style.display = "none";
    },
    open : function(e) {
      if(e.target.classList.contains('img')) {
        self._open(e);
      }
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