$('.custom-fab-menu').on('click', function (e) {
	e.stopPropagation();
	var $this = $(this),
	$menuGroup = $this.parent(),
	$subMenu = $this.next().children(),
	fabDir = '';
	if ($this.data("fab") == 'right') {
		fabDir = 'translateX(';
	} else if ($this.data("fab") == 'left') {
		fabDir = 'translateX(-';
	} else if ($this.data("fab") == 'up') {
		fabDir = 'translateY(-';
	} else {
		//fallback is down
		fabDir = 'translateY(';
	};
	$this.parent().toggleClass('open');
	if ($menuGroup.hasClass('open')) {
		(function () {
			var num = 0;
			$subMenu.each(function (index, value) {
				num += 48;
				$(this).css({ 'transform': '' + fabDir + num + 'px)' });
			});
		})();
	} else {
		$(this).removeAttr('style');
	}
});