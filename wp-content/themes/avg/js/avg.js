$(document).ready(function() {
	$(".entity-name").click(function() {
		var name = $(this).html();
		var $listing = $(this).siblings(".sub").find("ul");
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
});