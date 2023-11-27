document.addEventListener("DOMContentLoaded", function(event) {

	$(".showyourterms").each(function() {
		let term = new ShowYourTerms($(this)[0]);
	});

	// Navbar Mobile
	$(".navbar-burger").click(function() {
		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");
	});

	// Footer language select
	$("#footer-language-select-dropdown").on("change", function(e) {
		$("#footer-language-select").submit();
	});

	// Homepage Particles JS
	if ($("#main-bg-particles").length) {
		particlesJS.load('main-bg-particles', '/assets/js/bg-particles.json');
	}

	// Add a "isOnScreen()" function to jQuery
	$.fn.isOnScreen = function() {
		var win = $(window);
		var viewport = {
		top : win.scrollTop(),
		left : win.scrollLeft()
		};
		viewport.right = viewport.left + win.width();
		viewport.bottom = viewport.top + win.height();
		var bounds = this.offset();
		bounds.right = bounds.left + this.outerWidth();
		bounds.bottom = bounds.top + this.outerHeight();
		return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));
	};

	// Smooth scroll to anchors
	$('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top
				}, 1000, (function() {
					window.location.hash = this.hash
				}).bind(this));
				return false;
			}
		}
	});

});
