// JavaScript Document
window.addEvent("domready", function(){

	$$("a[href^='http']").addEvent("click", function(e){

		e.preventDefault();
		window.open(this.get("href"), "_blank");
	});

	$$("#menu a").each(function(item){

		var span = new Element('span', { text: item.get('text') });
		item.set('morph', { duration: 1000, transition: Fx.Transitions.Elastic.easeOut }).fade("hide");
		item.set('text', '').grab(span, 'bottom').grab(span.clone().set('class', 'over'), 'bottom');

		if(document.location.pathname.indexOf(item.get("href")) == -1) {

			item.getFirst().set('tween', { duration: 300, transition: Fx.Transitions.Expo.easeInOut });
			item.addEvent('mouseenter', span.tween.bind(span, ['margin-top', -20]));
			item.addEvent('mouseleave', span.tween.bind(span, ['margin-top', 0]));
		}
		else
			span.setStyle("margin-top", -15);
	});

}).addEvent("load", function(){

	$$("#menu a").each(function(item, i){
		item.fade.delay(100 * i, item, 1);
	});

});