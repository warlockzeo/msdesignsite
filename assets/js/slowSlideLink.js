//links slide slow
$("nav a").click(function (event) {
	event.preventDefault();
	var idElemento = $(this).attr("href");
	var deslocamento = $("#" + idElemento).offset().top;
	$('html, body').animate({ scrollTop: deslocamento }, 'slow');
});