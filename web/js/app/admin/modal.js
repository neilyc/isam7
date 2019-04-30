;(function(window) {
	var modal, closeEvent, validEvent;
  function Modal(selector) {
    self = this;
    self.selector = selector;
    modal = document.querySelector(selector);
		self._open();

		closeEvent = new CustomEvent("modal-close");
		validEvent = new CustomEvent("modal-valid");

		modal.querySelectorAll(".close").forEach(function(elem) {
			elem.onclick = function(e) {
				self._close(closeEvent);
			}
		});

		modal.querySelectorAll(".valide").forEach(function(elem) {
			elem.onclick = function(e) {
				self._close(validEvent);
			}
		});

		window.onclick = function(e) {
			if (event.target == modal) {
				self._close(closeEvent);
			}
		}
	};
	Modal.prototype = {
    defaults : {},
    _open : function() {
      modal.style.display = "block";
		},
		_close : function(event) {
			modal.style.display = "none";
			modal.dispatchEvent(event);
		}
  }
  window.Modal = Modal;
})(window);