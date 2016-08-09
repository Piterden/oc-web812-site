$(function() {

	$.each($('[data-color]'), function(index, val) {
		console.log($(this).data('color'));

		$(this).css('color', $(this).data('color'));
	});
});