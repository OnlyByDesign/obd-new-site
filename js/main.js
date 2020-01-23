const $ = jQuery;
function parallaxScroll(el, num) {
	let offset = window.pageYOffset;
	el.style.transform = "translateY(" + (offset * num + "px") + ')';
};
function replaceScrollBottom() {
	var target = document.querySelector(".scroll-bottom");
	//
};

$(document).ready(function() {
	if (document.getElementsByClassName(".page-id-598")) {
		document.querySelector(".intro__button").setAttribute("download", "BY-Resume");
	};
	window.addEventListener("scroll", function() {
		parallaxScroll( document.querySelector(".intro__main--subtitle"), -0.2 );
		parallaxScroll( document.querySelector(".testimonials__main--subtitle"), -0.2 );
		//parallaxScroll( document.querySelector(".contact__main--subtitle"), -0.2 );
		/*parallaxScroll( document.querySelector("#intro"), -0.1 );
		parallaxScroll( document.querySelector("#portfolio-43"), -0.125 ); // Unisys
		parallaxScroll( document.querySelector("#portfolio-47"), -0.15 ); // Dialogue
		parallaxScroll( document.querySelector("#portfolio-52"), -0.1 ); // Enautics
		parallaxScroll( document.querySelector("#portfolio-49"), -0.125 ); // Kaleidatone
		parallaxScroll( document.querySelector("#portfolio-55"), -0.15 ); // Business
		parallaxScroll( document.querySelector("#portfolio-62"), -0.1 ); // Segall*/
	});
});