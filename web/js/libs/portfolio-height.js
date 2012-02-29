/*
 * ---------------------------------------------------------------- 
 *  
 *  Portfolio list items equal height script.
 *  
 * ----------------------------------------------------------------  
 */


jQuery(document).ready(function(){	

	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	}
	equalHeight($(".three-columns li,.two-columns li,.four-columns li"));

});