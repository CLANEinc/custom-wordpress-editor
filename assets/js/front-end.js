$(function () {
	$('.accordion__head').click(function () {
		$(this).toggleClass('-active')
		$(this).next().slideToggle('fast');
	});
});
