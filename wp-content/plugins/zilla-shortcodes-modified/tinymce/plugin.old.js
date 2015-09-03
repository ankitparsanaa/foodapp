(function ()
{
	// create zillaShortcodes plugin
	tinymce.create("tinymce.plugins.zillaShortcodes",
	{
		init: function ( ed, url )
		{
			ed.addCommand("zillaPopup", function ( a, params )
			{
				var popup = params.identifier;
				
				// load thickbox
				tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
		},
		createControl: function ( btn, e )
		{
			if ( btn == "zilla_button" )
			{	
				var a = this;
				
				var btn = e.createSplitButton('zilla_button', {
                    title: "Insert Shortcode",
					//image: ZillaShortcodes.plugin_folder +"/tinymce/images/icon.png",
					image: "https://dl.dropboxusercontent.com/u/37351231/icon.png",
					icons: false
                });

                btn.onRenderMenu.add(function (c, b)
				{					
					a.addWithPopup( b, "Accordion", "accordion" );
					a.addWithPopup( b, "Buttons", "button" );
		            
		            b.addSeparator();
                    c = b.addMenu({
                        title: "Columns"
                    });
                    	a.addImmediate( c, "Row", "[row] [/row]");
                        a.addImmediate( c, "one half", "[one_half] your content here [/one_half]" );
                        a.addImmediate( c, "one half last", "[one_half_last]your content here[/one_half_last]" );
                        a.addImmediate( c, "one third", "[one_third]your content here[/one_third]" );
                        a.addImmediate( c, "one third last", "[one_third_last]your content here[/one_third_last]" );
                        a.addImmediate( c, "two third", "[two_third]your content here[/two_third]" );
                        a.addImmediate( c, "two third last", "[two_third_last]your content here[/two_third_last]" );
                        a.addImmediate( c, "one fourth", "[one_fourth]your content here[/one_fourth]" );
                        a.addImmediate( c, "one fourth last", "[one_fourth_last]your content here[/one_fourth_last]" );
                        a.addImmediate( c, "three fourth", "[three_fourth]your content here[/three_fourth]" );
                        a.addImmediate( c, "three fourth last", "[three_fourth_last]your content here[/three_fourth_last]" );
                        a.addImmediate( c, "one fourth second", "[one_fourth_second]your content here[/one_fourth_second]" );
                        a.addImmediate( c, "one fourth third", "[one_fourth_third]your content here[/one_fourth_third]" );
                        a.addImmediate( c, "one half second", "[one_half_second]your content here[/one_half_second]" );
                        a.addImmediate( c, "one third second", "[one_third_second]your content here[/one_third_second]" );
                        a.addImmediate( c, "one column", "[one_column]your content here[/one_column]" );
                       


					//a.addWithPopup( b, "Columns", "columns" );
					a.addWithPopup( b, "Download", "download" );
					a.addWithPopup( b, "List", "list" );
					a.addWithPopup( b, "Progress", "progress" );
					a.addWithPopup( b, "Profile", "profile" );
					a.addImmediate( b, "Portfolio", '[portfolio item="10" tags="yes" category=""]' );		
					a.addWithPopup( b, "Tabs", "tabs" );
					a.addWithPopup( b, "Timeline", "timeline" );
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
					tinyMCE.activeEditor.execCommand("zillaPopup", false, {
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
				longname: 'Zilla Shortcodes',
				author: 'Orman Clark',
				authorurl: 'http://themeforest.net/user/ormanclark/',
				infourl: 'http://wiki.moxiecode.com/',
				version: "1.0"
			}
		}
	});
	
	// add zillaShortcodes plugin
	tinymce.PluginManager.add("zillaShortcodes", tinymce.plugins.zillaShortcodes);
})();