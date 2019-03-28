
class ValidPopin {
  constructor() {
    this.popin = document.querySelector('.cd-popup.valid');
    this._init();
  }

  _init() {
    Array.prototype.forEach.call(document.querySelectorAll('a.delete'), function(btn) {
      btn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        this.url = e.target.href;
        this._openPopin();
      });
    });

    this._initButtons();
  }

  _initButtons() {
    if(this.popin) {
      this.popin.addEventListener('click', function(e) {
        var close = true;
        e.path.forEach(function(p) {
          if(p.className == 'cd-popup-no' || p.className == 'cd-popup-close') this._closePopin();
          if(p.className == 'cd-popup-yes') this._goToUrl(this.url);
          if(p.className == 'cd-popup-container') close = false;
        });

        if(close) this._closePopin();
      }); 
    }
  }

  _openPopin() {
    if(this.popin) {
      this.popin.classList.add('is-visible');
    } else {
      this._goToUrl(this.url);
    }
  }

  _closePopin() {
    this.popin.classList.remove('is-visible');
  }

  _goToUrl(url) {
    document.location = url;
  }
}