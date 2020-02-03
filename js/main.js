//const $ = jQuery;
//const page = ()=> document.title.split(' ', 1).toString().toLowerCase();
const DOM = {
	home: document.querySelector(".page-id-598"),
	about: document.querySelector(".page-id-594")
};
const parallaxScroll = (parallax) => {
	Object.values(parallax).forEach(function(current) {
		window.addEventListener( "scroll", ()=> document.getElementsByClassName(current[0])[0].style.transform = "translateY(" + (window.pageYOffset * current[1] + "px") + ')' );
	});
};
const parallaxItems = {
	home: {
		0: [ "hero__main", 0.1 ],
		1: [ "hero__sub--slider", -0.15 ],
		2: [ "scroll-bottom", -0.05 ],
		3: [ "intro__main--subtitle", -0.1 ],
		4: [ "work__left", -0.025 ],
		5: [ "work__right", 0.025 ]	
	},
	about: {
		0: [ "about__image", -0.15 ],
		1: [ "about__copy", 0.1 ]
	}
};

function onScroll() {
	// window.addEventListener( "scroll", ()=> parallaxScroll(parallaxItems.page) );
};
function home() {
	parallaxScroll(parallaxItems.home);
	document.querySelector(".intro__button").setAttribute("download", "BY-Resume");
};
function about() {
	parallaxScroll(parallaxItems.about);
};

(()=> {
	if (document.body.contains(DOM.home)) home();
	if (document.body.contains(DOM.about)) home();
})();