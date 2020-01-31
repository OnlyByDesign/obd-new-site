const $ = jQuery;
const parallaxScroll = (parallax) => {
	Object.values(parallax).forEach(function(current) {
		window.addEventListener( "scroll", ()=> document.getElementsByClassName(current[0])[0].style.transform = "translateY(" + (window.pageYOffset * current[1] + "px") + ')');
	});
};

const parallaxItems = {
	home: {
		0: [ "hero__main", 0.1 ],
		1: [ "hero__sub--slider", -0.15 ],
		2: [ "scroll-bottom", -0.05 ],
		3: [ "intro__main--subtitle", -0.1 ],
		//4: [ "intro__copy--sub", 0.05 ],
		5: [ "work__left", -0.025 ],
		6: [ "work__right", 0.025 ]	
	}
};
function home() {
	parallaxScroll(parallaxItems.home);
	document.querySelector(".intro__button").setAttribute("download", "BY-Resume");
};
function onScroll() {
	//window.addEventListener( "scroll", func );	
};
(()=> {
	if (document.getElementsByClassName(".page-id-598") !== null) home();
})();