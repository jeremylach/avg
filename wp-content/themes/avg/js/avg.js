$(document).ready(function() {
	$(".entity-name").click(function() {
		var name = $(this).html();
		var $listing = $(this).siblings().find(".facts");
		$listing.toggle();
		/*var entity = $.grep(entities, function(e){ return e.name == name; });
		var entity_facts = entity[0].facts;
		
		$(entity_facts).each(function() {
			var fact_content = name + " " + this.description + " " + this.value + " " + this.unit;
			if (this.perunit !== null) {
				fact_content += " per " + this.perunit;
			}
			listing.append("<li>"+fact_content+"</li>");
		});*/
	});

	$(".sub-unit-trigger").click(function() {
		var $breakdown = $(this).siblings(".breakdown").find("ul");
		var random_small_unit = smallunits[Math.floor(Math.random() * smallunits.length)];
		var fact_price = $(this).data("quantity"); //price per year
		var output = "<li>That's " + Math.floor(fact_price / random_small_unit.price) + " " + random_small_unit.name + "(s) per year</li>";
		output += "<li>OR " + Math.floor(fact_price / random_small_unit.price / 365) + " " + random_small_unit.name + "(s) per day</li>";
		$breakdown.html(output);
	});
});