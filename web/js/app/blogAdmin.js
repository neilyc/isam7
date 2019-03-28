;(function(window) {
  var self;
  function BlogAdmin() {
    self = this;
    self.countPhoto = 1;
  };
  BlogAdmin.prototype = {
    initPhoto : function() {
      var group = document.createElement('div'),
          label = document.createElement('label'),
          field = document.createElement('div'),
          control = document.createElement('input'),
          container = document.querySelector('.photos');

      group.className = 'form-group';  
      label.className = 'control-label';  
      label.innerHTML = 'Image '+self.countPhoto;
      field.className = 'sonata-ba-field';
      control.type = 'file';
      control.classList.add('form-control');

      control.name = 'photos['+self.countPhoto+']';

      field.appendChild(control);
      group.appendChild(label);
      group.appendChild(field);

      container.appendChild(group);

      self.countPhoto++;
    }
  }
  window.BlogAdmin = BlogAdmin;
})(window);