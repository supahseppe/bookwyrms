
// start the popup specefic scripts
// safe to use $
jQuery(document).ready(function($) {
    var thsts = {
    	loadVals: function()
    	{
    		var shortcode = $('#_thst_shortcode').text(),
    			uShortcode = shortcode;
    		
    		// fill in the gaps eg {{param}}
    		$('.thst-input').each(function() {
    			var input = $(this),
    				id = input.attr('id'),
    				id = id.replace('thst_', ''),		// gets rid of the thst_ prefix
    				re = new RegExp("{{"+id+"}}","g");
    				
    			uShortcode = uShortcode.replace(re, input.val());
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thst_ushortcode').remove();
    		$('#thst-sc-form-table').prepend('<div id="_thst_ushortcode" class="hidden">' + uShortcode + '</div>');
    	},
    	cLoadVals: function()
    	{
    		var shortcode = $('#_thst_cshortcode').text(),
    			pShortcode = '';
    			shortcodes = '';
    		
    		// fill in the gaps eg {{param}}
    		$('.child-clone-row').each(function() {
    			var row = $(this),
    				rShortcode = shortcode;
    			
    			$('.thst-cinput', this).each(function() {
    				var input = $(this),
    					id = input.attr('id'),
    					id = id.replace('thst_', '')		// gets rid of the thst_ prefix
    					re = new RegExp("{{"+id+"}}","g");
    					
    				rShortcode = rShortcode.replace(re, input.val());
    			});
    	
    			shortcodes = shortcodes + rShortcode + "\n";
    		});
    		
    		// adds the filled-in shortcode as hidden input
    		$('#_thst_cshortcodes').remove();
    		$('.child-clone-rows').prepend('<div id="_thst_cshortcodes" class="hidden">' + shortcodes + '</div>');
    		
    		// add to parent shortcode
    		this.loadVals();
    		pShortcode = $('#_thst_ushortcode').text().replace('{{child_shortcode}}', shortcodes);
    		
    		// add updated parent shortcode
    		$('#_thst_ushortcode').remove();
    		$('#thst-sc-form-table').prepend('<div id="_thst_ushortcode" class="hidden">' + pShortcode + '</div>');
    	},
    	children: function()
    	{
    		// assign the cloning plugin
    		$('.child-clone-rows').appendo({
    			subSelect: '> div.child-clone-row:last-child',
    			allowDelete: false,
    			focusFirst: false
    		});
    		
    		// remove button
    		$('.child-clone-row-remove').live('click', function() {
    			var	btn = $(this),
    				row = btn.parent();
    			
    			if( $('.child-clone-row').size() > 1 )
    			{
    				row.remove();
    			}
    			else
    			{
    				alert('You need a minimum of one row');
    			}
    			
    			return false;
    		});
    		
    		// assign jUI sortable
    		$( ".child-clone-rows" ).sortable({
				placeholder: "sortable-placeholder",
				items: '.child-clone-row'
				
			});
    	},
    	resizeTB: function()
    	{
			var	ajaxCont = $('#TB_ajaxContent'),
				tbWindow = $('#TB_window'),
				thstPopup = $('#thst-popup');

            tbWindow.css({
                height: thstPopup.outerHeight() + 50,
                width: thstPopup.outerWidth(),
                marginLeft: -(thstPopup.outerWidth()/2)
            });

			ajaxCont.css({
				paddingTop: 0,
				paddingLeft: 0,
				paddingRight: 0,
				height: (tbWindow.outerHeight()-47),
				overflow: 'auto', // IMPORTANT
				width: thstPopup.outerWidth()
			});
			
			$('#thst-popup').addClass('no_preview');
    	},
    	load: function()
    	{
    		var	thsts = this,
    			popup = $('#thst-popup'),
    			form = $('#thst-sc-form', popup),
    			shortcode = $('#_thst_shortcode', form).text(),
    			popupType = $('#_thst_popup', form).text(),
    			uShortcode = '';
    		
    		// resize TB
    		thsts.resizeTB();
    		$(window).resize(function() { thsts.resizeTB() });
    		
    		// initialise
    		thsts.loadVals();
    		thsts.children();
    		thsts.cLoadVals();
    		
    		// update on children value change
    		$('.thst-cinput', form).live('change', function() {
    			thsts.cLoadVals();
    		});
    		
    		// update on value change
    		$('.thst-input', form).change(function() {
    			thsts.loadVals();
    		});
    		
    		// when insert is clicked
    		$('.thst-insert', form).click(function() {    		 			
    			/*if(window.tinyMCE) {
					window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, $('#_thst_ushortcode', form).html());
					tb_remove();
				}*/

                if(parent.tinymce) {
                    parent.tinymce.activeEditor.execCommand('mceInsertContent',false,$('#_thst_ushortcode', form).html());
                    tb_remove();
                }
    		});
    	}
	}
    
    // run
    $('#thst-popup').livequery( function() { thsts.load(); } );
});