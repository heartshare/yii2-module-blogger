$(document).ready(function (){
	
// ===============================================================
// =========================== MENU ==============================
// ===============================================================

	// Hide menu
	$('#blogger-post-actions').animate({
		left: "-250",
	}, 500, function() {
	  // Animation complete.
	});

	// Show menu
	$('#blogger-post-actions').hover(
		function() {
			$('#blogger-post-actions').stop().animate({
				left: "0",
			}, 100, function() {
			  // Animation complete.
			});
		}, function() {
			$('#blogger-post-actions').stop().animate({
				left: "-250",
			}, 100, function() {
			  // Animation complete.
			});
		}
	);

// ===============================================================
// ========================= END MENU ============================
// ===============================================================

});