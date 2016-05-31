(function(window, document, undefined) {
  var modal, modalImg, close;

  var Modal = function(elem) {
    this.init();

    var items = document.querySelectorAll(elem);
    Array.prototype.forEach.call(items, function(item) {
      item.addEventListener('click', this.open, this);
    }, this);

    modal.addEventListener('click', this.close, this);
  };

  Modal.prototype.init = function() {
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

    return this;
  };
  
  Modal.prototype.open = function() {
    var currentImg = this.querySelector('.img');

    modal.style.display = "block";
    modalImg.src = currentImg.src;
    modalImg.alt = currentImg.alt;

    return this;
  };

  Modal.prototype.close = function() {
    modal.style.display = "none";
  }

  window.Modal = Modal;

})(window, document);