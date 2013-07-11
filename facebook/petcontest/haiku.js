$(document).ready(function() {
	$(".iframe").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'width'             : 350,
				'height'            : 410,
				'onClosed'          : function() {
					window.location.reload(true);
				}
	});
					
	$(".vote").click(function() {
		var id = $(this).attr( 'ID' );
		var currentVotes = $(".voteNum[title=" + id + "]").html();
		$.post('vote.php', { id: id }, function(data) {
			if (data == "1") {
				$(".voteNum[title=" + id + "]").fadeOut(500).html((parseInt(currentVotes) + 1)).fadeIn(500);
			}
		});
	});
});