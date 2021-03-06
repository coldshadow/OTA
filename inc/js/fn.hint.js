jQuery.fn.hint = function (blurClass) {
	
  if (!blurClass) {
    blurClass = 'blur';
  }

  return this.each(function () {
    var $input = jQuery(this),
      title = $input.attr('title'),
      $form = jQuery(this.form),
      $win = jQuery(window);
			
    function remove() {
      if ($input.val() === title && $input.hasClass(blurClass)) {
        $input.val('').removeClass(blurClass);
      }
    }
    if (title) {
      $input.blur(function () {
        if (this.value === '') {
          $input.val(title).addClass(blurClass);
        }
      }).focus(remove).blur();

      $form.submit(remove);
      $win.unload(remove);
    }
		
  });
	
};