;(function(window) {
  'use strict';
  var self;
  function App() {
    self = this;
    self._init();
  };
  App.prototype = {
    _init: function() {   
      self._initNav();

      /*if(document.querySelector('.list')) {
        var validPopin = new ValidPopin();
      }*/

      window.onload = function() {
        tinymce.init({ 
          selector:'textarea',
          language: 'fr_FR',
          language_url: '/js/admin/app.min.js' 
        });
        self._menuCheckActive();
      }
    },
    _initNav: function() {
      document.querySelector('.toggle-nav').addEventListener('click', function(e) {
        document.querySelector('.sidenav').classList.toggle("open");
        document.querySelector('.container').classList.toggle("open");
        this.classList.toggle("open");
      });
    },
    _menuCheckActive: function() {
      var urlMatch = false,
          path = decodeURIComponent(window.location.pathname),
          href;

      Array.prototype.forEach.call(document.querySelectorAll('.sidenav a'), function (elem) {
        href = elem.getAttribute('href');
        if (path.substring(0, href.length) === href && href != '/') {
          elem.classList.add('active');
        }
      });
    }
  }
  window.App = App;

})(window);