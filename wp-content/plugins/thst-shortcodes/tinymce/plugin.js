(function($) {
"use strict";
 


	//Shortcodes
	tinymce.PluginManager.add( 'thstShortcodes', function( editor, url ) {
		editor.addCommand("thstPopup", function ( a, params ) {
			var popup = params.identifier;
			tb_show("Insert Thst Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
		});
     
        editor.addButton( 'thst_button', {
            type: 'splitbutton',
            icon: false,
			title: 'Thst Shortcodes',
			onclick : function(e) {},
			menu: [
			{text: 'Alerts',onclick:function(){
				editor.execCommand("thstPopup", false, {title: 'Alerts',identifier: 'alert'})
			}},
			{text: 'Buttons',onclick:function(){
				editor.execCommand("thstPopup", false, {title: 'Buttons',identifier: 'button'})
			}},
			{text: 'Columns',onclick:function(){
				editor.execCommand("thstPopup", false, {title: 'Columns',identifier: 'columns'})
			}},
			{text: 'Tabs',onclick:function(){
				editor.execCommand("thstPopup", false, {title: 'Tabs',identifier: 'tabs'})
			}},
			{text: 'Toggle',onclick:function(){
				editor.execCommand("thstPopup", false, {title: 'Toggle',identifier: 'toggle'})
			}},
			]   
        });
    });
})(jQuery);