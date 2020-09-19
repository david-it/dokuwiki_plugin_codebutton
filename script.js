/**

 * Javascript src code for DokuWiki plugin 'codebuttonmod2'

 * 
 * GitHub fork https://github.com/david-it/dokuwiki_plugin_codebutton
 * @author david-it (Davide Rolando)
 */

jQuery(document).ready( function() {

	urlgets = jQuery(location).attr('search');
	if(urlgets == "" || urlgets.search("do=") > 0) {
		// Ignore plugin
		return false;
	} else {
		jQuery("pre").wrap( "<div class='pre_wrap'></div>" );
		jQuery("div.pre_wrap").prepend('<a class="copybtn o-tooltip--left" style="background-color: rgba(0, 0, 0, 0)" data-tooltip="Copy"><img src="lib/plugins/codebuttonmod2/image/copy-button.svg" alt="Copy to clipboard"></a>');
		jQuery("div.pre_wrap").css({"position":"relative","overflow":"auto"});
	}

	jQuery( ".copybtn" ).click( function() {
		
		var ret = jQuery( this ).parent().children('pre').text();
		
		// Generate a random id
		let randomID = "id_" + Math.random().toString(36).substring(2, 15);

		// Add aux input to document
		jQuery( this ).parent().append(jQuery('<textarea></textarea>').attr('id',randomID).html(ret));

		// Copy the content (original code here: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_copy_clipboard2)
		var copyText = document.getElementById(randomID);
		copyText.select();
		copyText.setSelectionRange(0, 99999);
		document.execCommand("copy");	


		var copy_a = jQuery( this ).parent().children('a');
		copy_a.attr('data-tooltip','Copied!').delay( 500 ).queue(function() { copy_a.attr('data-tooltip','Copy') });

		// Remove the aux input from document
		jQuery( "textarea#" + randomID ).remove();

	});

});

