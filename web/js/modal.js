;(function(window) {
  'use strict';
  var modal, modalImg, close;
  function Modal(elem, options) {
    this.elem = elem;
    this._init();
    this.options = extend( this.defaults, options );

    var items = document.querySelectorAll(this.elem);
    Array.prototype.forEach.call(items, function(item) {
      item.addEventListener('click', this._open);
    }, this);

    modal.addEventListener('click', this._close);
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
      modalImg.alt = currentImg.alt;
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