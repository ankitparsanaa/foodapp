(function($) {
"use strict";   
 

              


 			//Shortcodes
            tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {

				editor.addCommand("zillaPopup", function ( a, params )
				{
					var popup = params.identifier;
					tb_show("Insert Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
				});
     
                editor.addButton( 'zilla_button', {
                    type: 'splitbutton',
                  //  image: "https://dl.dropboxusercontent.com/u/37351231/icon.png",
                    icon: false,
                    text:'Shortcode',
					title:  'Shortcodes',
					onclick : function(e) {},
					menu: [

							// {text: 'Accordion',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Accordion',identifier: 'accordion'})
								 
							// }},

							{text: 'Buttons',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Buttons',identifier: 'button'})
								 //editor.insertContent('Title: ');
							}},

							{


     //                	a.addImmediate( c, "Row", "[row] [/row]");
     //                    a.addImmediate( c, "one half", "[one_half] your content here [/one_half]" );
     //                    a.addImmediate( c, "one half last", "[one_half_last]your content here[/one_half_last]" );
     //                    a.addImmediate( c, "one third", "[one_third]your content here[/one_third]" );
     //                    a.addImmediate( c, "one third last", "[one_third_last]your content here[/one_third_last]" );
     //                    a.addImmediate( c, "two third", "[two_third]your content here[/two_third]" );
     //                    a.addImmediate( c, "two third last", "[two_third_last]your content here[/two_third_last]" );
     //                    a.addImmediate( c, "one fourth", "[one_fourth]your content here[/one_fourth]" );
     //                    a.addImmediate( c, "one fourth last", "[one_fourth_last]your content here[/one_fourth_last]" );
     //                    a.addImmediate( c, "three fourth", "[three_fourth]your content here[/three_fourth]" );
     //                    a.addImmediate( c, "three fourth last", "[three_fourth_last]your content here[/three_fourth_last]" );
     //                    a.addImmediate( c, "one fourth second", "[one_fourth_second]your content here[/one_fourth_second]" );
     //                    a.addImmediate( c, "one fourth third", "[one_fourth_third]your content here[/one_fourth_third]" );
     //                    a.addImmediate( c, "one half second", "[one_half_second]your content here[/one_half_second]" );
     //                    a.addImmediate( c, "one third second", "[one_third_second]your content here[/one_third_second]" );
     //                    a.addImmediate( c, "one column", "[one_column]your content here[/one_column]" );
         


								            text: 'Columns',
								            menu: [
								            	{text: 'row', onclick: function() {editor.insertContent('[row] [/row]');}},
								                {text: 'One Half', onclick: function() {editor.insertContent('[one_half] your content here [/one_half]');}},
								                {text: 'One Half Last', onclick: function() {editor.insertContent('[[one_half_last]your content here[/one_half_last]');}},
								                {text: 'One Third', onclick: function() {editor.insertContent('[one_third] your content here [/one_third]');}},
								                {text: 'One Third Last', onclick: function() {editor.insertContent('[one_third_last] your content here [/one_third_last]');}},
								                {text: 'One Fourth', onclick: function() {editor.insertContent('[one_fourth] your content here [/one_fourth]');}},
								                {text: 'One Fourth Last', onclick: function() {editor.insertContent('[one_fourth_last] your content here [/one_fourth_last]');}},
								                {text: 'Three Fourth', onclick: function() {editor.insertContent('[three_fourth] your content here [/three_fourth]');}},
								                {text: 'Three Fourth Last', onclick: function() {editor.insertContent('[three_fourth_last] your content here [/three_four_last]');}},
								                {text: 'One Fourth Second', onclick: function() {editor.insertContent('[one_fourth_second] your content here [/one_fourth_second]');}},
								                {text: 'One Fourth Third', onclick: function() {editor.insertContent('[one_fourth_third] your content here [/one_fourth_third]');}},
								                {text: 'One Half Second', onclick: function() {editor.insertContent('[one_half_second] your content here [/one_half_second]');}},
								                {text: 'One Third Second', onclick: function() {editor.insertContent('[one_third_second] your content here [/one_third_second]');}},
								                {text: 'One Column', onclick: function() {editor.insertContent('[one_column] your content here [/one_column]');}},
								               
								            ]
							},
							
							// {text: 'Download',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Download',identifier: 'download'})
							// 	 //editor.insertContent('Title: ');
							// }},

							{text: 'Blog',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Blog',identifier: 'blog_post'})
								 //editor.insertContent('Title: ');
							}},

							{text: 'Heading',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Heading',identifier: 'heading'})
								 //editor.insertContent('Title: ');
							}},


							{text: 'Buy Item',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Buy',identifier: 'buy_theme'})
								 //editor.insertContent('Title: ');
							}},



							// {text: 'List',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'List',identifier: 'list'})
							// 	 //editor.insertContent('Title: ');
							// }},

							// {text: 'Name',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Name',identifier: 'name'})
							// 	 //editor.insertContent('Title: ');
							// }},

							// {text: 'Progress',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Progress',identifier: 'progress'})
							// 	 //editor.insertContent('Title: ');
							// }},

							// {text: 'Profile',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Profile',identifier: 'profile'})
							// 	 //editor.insertContent('Title: ');
							// }},


							// {text: 'Portfolio',onclick:function(){
							// 	//editor.execCommand("zillaPopup", false, {title: 'Download',identifier: 'download'})
							// 	 editor.insertContent('[portfolio item="10" tags="yes" category=""]');
							// }},


							{text: 'Tabs',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Tabs',identifier: 'tabs'})
								 //editor.insertContent('Title: ');
							}},
							// {text: 'Timeline',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Timeline',identifier: 'timeline'})
							// 	 //editor.insertContent('Title: ');
							// }},

							// {text: 'Toggle',onclick:function(){
							// 	editor.execCommand("zillaPopup", false, {title: 'Toggle',identifier: 'toggle'})
							// 	 //editor.insertContent('Title: ');
							// }},


							{text: 'Video',onclick:function(){
								editor.execCommand("zillaPopup", false, {title: 'Video',identifier: 'video'})
								 //editor.insertContent('Title: ');
							}},



					]

                
        	  });
         
          });
         

 
})(jQuery);



