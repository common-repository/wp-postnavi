
/*********ColorPicker********/

jQuery(document).ready(function($) {
	$('#postnavi_link_color').colpick({
	layout:'hex',
	submit:0,
	colorScheme:'dark',
	onChange:function(hsb,hex,rgb,el,bySetColor) {
		$(el).css('border-color','#'+hex);
		if(!bySetColor) $(el).val(hex);
	}
	}).keyup(function(){
		$(this).colpickSetColor(this.value);
	});	
});