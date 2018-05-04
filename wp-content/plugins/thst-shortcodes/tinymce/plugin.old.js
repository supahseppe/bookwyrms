(function () {
	// create thstShortcodes plugin
	tinymce.create("tinymce.plugins.thstShortcodes", {
		init: function ( ed, url ) {
			ed.addCommand("thstPopup", function ( a, params ) {
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Thst Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e ) {
			if ( btn == "thst_button" ) {	
				var a = this;
				
				var btn = e.createSplitButton('thst_button', {
                    title: "Insert Thst Shortcode",
					image: ThstShortcodes.plugin_folder +"/tinymce/images/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b) {					
					a.addWithPopup( b, "Alerts", "alert" );
					a.addWithPopup( b, "Buttons", "button" );
					a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Toggle", "toggle" );
					a.addWithPopup( b, "Video", "video" );
				});
                
                return btn;
			}
			
			return null;
		},
		addWithPopup: function ( ed, title, id ) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand("thstPopup", false, {
						title: title,
						identifier: id
					})
				}
			})
		},
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		getInfo: function () {
			return {
				longname: 'Thst Shortcodes',
				author: 'Theme Station',
				authorurl: 'http://themeforest.net/user/themestation/',
				infourl: 'http://themestation.net/plugins',
				version: "1.0"
			}
		}
	});
	
	// add thstShortcodes plugin
	tinymce.PluginManager.add("thstShortcodes", tinymce.plugins.thstShortcodes);
})();