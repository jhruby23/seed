jQuery(document).ready(function($){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.ajaxSetup({
		headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
	});

	$('#add-comment').click(function(e){
		var $textarea = $('#comment-text');
		e.preventDefault();
		$.ajax({
			url: '../add-comment',
			type: 'POST',
			data: {
				product: $textarea.data('id'),
				check: $textarea.data('check'),
				text: $textarea.val(),
			},
		}).success(function(result){
			$('#comments').html(result);
			$textarea.val('');
		});
	});
});
