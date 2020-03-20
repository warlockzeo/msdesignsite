//menu retratil
$(window).bind('scroll', function () {
	if ($(window).scrollTop() < 150) {
		$('nav.retratil').css({'top':'-65px'});
	} else {
		$('nav.retratil').css({'top':'0'});
	}
});