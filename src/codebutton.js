/**
 * Javascript src code for DokuWiki plugin 'codebuttonmod1'
 * 
 * GitHub fork https://github.com/david-it/dokuwiki_plugin_codebutton
 * @author david-it (Davide)
 */

jQuery(document).ready( function() {
	
	jQuery("pre").click( function() {
		
		// Ignore plugin for any action mode and when no get variable is set (section edit mode)
		urlgets = jQuery(location).attr('search');
		if(urlgets == ""){return false;};
		if(urlgets.search("do=") > 0){return false};
	
		ret = jQuery( this ).text();
		
		// Temporary modification of background
		var bgColor = jQuery( this ).css("background-color")
		jQuery( this ).css("background-color", "#ccc");
		
		// Generate a random id
		let randomID = "id_" + Math.random().toString(36).substring(2, 15);
		
		// Add Overlay text
		jQuery( this ).wrap( "<div class='" + randomID + "_wrap" + "'></div>" );
		jQuery( this ).parent().css({"position":"relative"});
		jQuery( this ).parent().prepend('<div class="dvCodeCopyOverlay"><small>Copied to clipboard</small></div>');
		jQuery( ".dvCodeCopyOverlay" ).css({"position": "absolute", "left": "4px", "top":"4px", "width":"99%", "color":"grey", "background":"#f5f5f5", "border-radius":"5px", "opacity":"0.8"});
		
		// Add aux input to document
		jQuery( this ).parent().append(jQuery('<textarea></textarea>').attr('id',randomID).html(ret));
		
		// Copy the content (original code here: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2)
		var copyText = document.getElementById(randomID);
		copyText.select();
		copyText.setSelectionRange(0, 99999);
		document.execCommand("copy");
		
		// Remove the aux input from document
		jQuery( "textarea#" + randomID ).remove();
		
		
		jQuery( this ).delay( 1000 ).queue(function() {
			jQuery( this ).unwrap();
			jQuery( this ).css("background-color", bgColor);
			jQuery( ".dvCodeCopyOverlay" ).remove()
		});

	});
  
});
