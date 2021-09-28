jQuery(function( $ ) {
	'use strict';
	$('.tab_tabs').children('.tab_item').each(function () {
		$(this).on('click', function () {

			$('.tab_item').removeClass('active_item')
			$(this).addClass('active_item')

			let dataId = $(this).attr('data-id');
			
			$('.tab_item_data').removeClass('tabshow')
			$(".tab_item_data[data-id='" + dataId + "']").addClass('tabshow')
			
		})
	});
});