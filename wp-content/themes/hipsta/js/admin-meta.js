jQuery(document).ready(function($){
	
	var importBtn = jQuery('#import-demo-content');
	  
	importBtn.bind("click", (function(e){
		e.preventDefault();

		importBtn.addClass('disabled').attr('disabled', 'disabled').unbind('click');
	      
		jQuery.ajax({
			method: "POST",
			url: ajaxurl,
			data: {
				'action':'wi_import_ajax'
			},
			success: function(data){
				jQuery('#option-tree-header-wrap').before('<div id="message" class="updated fade below-h2"><p>'+data+' Theme Options updated.</p></div>');
			},
			complete: function(){
        		window.location.href=window.location.href;
			}
		});
	
	}));
});