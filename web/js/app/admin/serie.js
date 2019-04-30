;(function(window) {
  var self;
  function Serie() {
		self = this;
		self.deletePaintings = [];
		self.newPaintings = [];
		self.init();
  };
  Serie.prototype = {
    init : function() {
      Array.prototype.forEach.call(document.querySelectorAll('a.less'), function(btn) {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					self._delete(this);
				});
			});
			Array.prototype.forEach.call(document.querySelectorAll('a.add'), function(btn) {
				btn.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					self._revert(this);
				});
			});
			document.querySelector('.add-paintings').addEventListener('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				self._addModal(this);
			});
			document.querySelector('.modal').addEventListener('modal-close', function(e) {
				self._closeModal();
			});
			document.querySelector('.modal').addEventListener('modal-valid', function(e) {
				e.preventDefault();
				e.stopPropagation();
			});
		},
		_delete: function(elem) {
			elem = elem.closest('li');
			self.deletePaintings.push(+elem.getAttribute("data-id"));

			self._setStyles(elem, {less:{display:"none"}, background:{opacity: ".5"}, add:{display: "block"}});
			
			self._setDeletePaintings();
		},
		_revert: function(elem) {
			elem = elem.closest('li');

			var index = self.deletePaintings.indexOf(+elem.getAttribute("data-id"));
			if (index > -1) {
				self.deletePaintings.splice(index, 1);
				self._setStyles(elem, {less:{display:"block"}, background:{opacity: "1"}, add:{display: "none"}});
				self._setDeletePaintings();
			}
		},
		_setDeletePaintings: function() {
			document.querySelector('input[name="delete-paintings"]').value = self.deletePaintings.join(',');
		},
		_setNewPaintings: function() {
			document.querySelector('input[name="new-paintings"]').value = self.newPaintings.join(',');
		},
		_setStyles: function(elem, options) {
			elem.querySelector('.actions .less').style.display=options.less.display;
			elem.querySelector('.actions .add').style.display=options.add.display;
			elem.querySelector('.background-cover').style.opacity=options.background.opacity;
		},
		_addModal: function(elem) {
			axios.get(elem.href)
			.then(function (response) {
				document.querySelector('.modal .modal-content .modal-body').innerHTML = "";
				document.querySelector('.modal .modal-content .modal-body').innerHTML = response.data;
				new Modal('.modal');
				Array.prototype.forEach.call(document.querySelectorAll('a.ico.add'), function(btn) {
					btn.addEventListener('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						self._add(this);
					});
				});
				Array.prototype.forEach.call(document.querySelectorAll('a.ico.less'), function(btn) {
					btn.addEventListener('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						self._less(this);
					});
				});
			});
		},
		_closeModal: function() {
			self.newPaintings = [];
			self._setNewPaintings();
		},
		_add: function(elem) {
			elem = elem.closest('li');
			self._setStyles(elem, {less:{display:"block"}, background:{opacity: "1"}, add:{display: "none"}});
			self.newPaintings.push(+elem.getAttribute("data-id"));
			self._setNewPaintings();
		},
		_less: function(elem) {
			elem = elem.closest('li');
			self._setStyles(elem, {less:{display:"none"}, background:{opacity: ".5"}, add:{display: "block"}});
			var index = self.newPaintings.indexOf(+elem.getAttribute("data-id"));
			if (index > -1) {
				self.newPaintings.splice(index, 1);

				self._setNewPaintings();
			}
		}
  }
  window.Serie = Serie;
})(window);