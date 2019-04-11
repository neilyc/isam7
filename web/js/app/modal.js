;(function(window) {
  var modal, self, closeModal;
  function Modal(elem, options) {
    self = this;
    self.elem = elem;
    self._init();
    closeModal = true;
    self.options = extend( self.defaults, options );

    if(self.elem) {;
      Array.prototype.forEach.call(document.querySelectorAll(self.elem), function(item) {
        item.addEventListener('click', self._open);
      });
    }
    modal.querySelector('.imgs').addEventListener('click', function(e) {
      closeModal = false;
      setTimeout(function(){ 
        closeModal = true;
      }, 300);
    });
    modal.addEventListener('click', self._close);
  };
  Modal.prototype = {
    defaults : {},
    _init : function() {
      modal = document.querySelector("div.gallery-modal");
    },
    _open : function(e) {
      Array.prototype.forEach.call(modal.querySelectorAll(".imgs-item"), function(item) {
        item.style.border = "0";
        item.style.margin = "5px";
        if(item.querySelector('img').src == e.target.src) {
          item.style.border = "1px solid white";
          item.style.margin = "4px";
        }
      });
      modal.querySelector('img.gallery-modal-content').src = e.target.src;
      modal.style.display = "block";  
    },
    _close : function() {
      if(closeModal) {
        modal.style.display = "none";
      }
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