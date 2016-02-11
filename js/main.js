
(function($){

	window.timer 	= {};
	timer.i 		= 10;

	function initCountdown() {
		var p = $('<p />', {
			text: 'You are not authorized to view this page. You will be redirected in ',
			id: "timer"
		});
		var span = $('<span />', {
			text: 10
		});

		$('body').append(p);
		$('#timer').append(span);
	}

	function theCountdown() {
		if(timer.i == 0) { 
			window.location.href = "http://localhost/php_login"
			clearInterval(timer.intervalId);

		}
		// console.log(timer.i);
		$("#timer span").text(timer.i);
		timer.i--;
	}

	$(document).ready(function() {
		if( window.location.pathname.indexOf('private') > -1 && auth !== 1){
			initCountdown();
			timer.intervalId = window.setInterval(theCountdown, 1000);
		}
	});
})(jQuery);

// set interval
// create countdown from 10 to 0
// redirect to login on 0
// 