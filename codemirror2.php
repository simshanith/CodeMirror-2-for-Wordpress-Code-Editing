<?php
/*
Plugin Name: codemirror2-wordpress-editor
Plugin URI: http://codemirror.net
Description: Adds syntax highlighting for the in-dashboard editor
Version: 1.0
Author: Shane Daniel
Author URI: http://simloovoo.com
License: GPL2
*/
$theme = 'default';

function insertScripts($adminHead){

   
   $mode = '"css"';

   if(isset($_GET['file']))
     $mode = (strrchr($_GET['file'], '.php') == '.php') ? '"php"' : '"css"';
  echo
   '<script src="' . plugins_url() .
   '/codemirror2/lib/codemirror.js"></script>
   <link rel="stylesheet" href="' . plugins_url() .
   '/codemirror2/lib/codemirror.css" />
   <script src="' .plugins_url() .
   '/codemirror2/mode/xml/xml.js"></script>
   <script src="' .plugins_url() .
   '/codemirror2/mode/javascript/javascript.js"></script>
   <script src="' .plugins_url() .
   '/codemirror2/mode/css/css.js"></script>
   <script src="' .plugins_url() .
   '/codemirror2/mode/clike/clike.js"></script>
   <script src="' .plugins_url() .
   '/codemirror2/mode/php/php.js"></script>
   <link rel="stylesheet" href="' . plugins_url() .
   '/codemirror2/theme/default.css" />
   <link rel="stylesheet" href="' . plugins_url() .
   '/codemirror2/theme/elegant.css" />
   <link rel="stylesheet" href="' . plugins_url() .
   '/codemirror2/theme/neat.css" />
   <link rel="stylesheet" href="' . plugins_url() .
   '/codemirror2/theme/night.css" />
   <style>
     #template .CodeMirror, #template .CodeMirror div {
     margin-right: 40px;
     height: auto;
     }


     .CodeMirror .fullscreen {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            margin: 0;
            padding: 0;
            border: 0px solid #BBBBBB;
            opacity: 1;
';  
  switch($theme){
	case 'default':
	case 'elegant':
	case 'neat' :
	  echo 'background-color: white;';
	  break;
  }
echo '        }
   </style>
   <script>
     jQuery(document).ready(function(){

function toggleFullscreenEditing()
    {
        var editorDiv = jQuery(".CodeMirror-scroll");
        if (!editorDiv.hasClass("fullscreen")) {
            toggleFullscreenEditing.beforeFullscreen = { height: editorDiv.height(), width: editorDiv.width() }
            editorDiv.addClass("fullscreen");
            editorDiv.height("100%");
            editorDiv.width("100%");
            editor.refresh();
        }
        else {
            editorDiv.removeClass("fullscreen");
            editorDiv.height(toggleFullscreenEditing.beforeFullscreen.height);
            editorDiv.width(toggleFullscreenEditing.beforeFullscreen.width);
            editor.refresh();
        }
    }
	var textarea =  document.getElementById("newcontent");
		if(textarea){
			CodeMirror.fromTextArea(document.getElementById("newcontent"),
			{
			theme: "elegant",
			mode: '.$mode.',
			lineNumbers: true,
                        onKeyEvent: function(i, e) {
                         // Hook into F11
                       	   if ((e.keyCode == 122 || e.keyCode == 27) && e.type == "keydown") {
                        	   e.stop();
                           	   return toggleFullscreenEditing();
             			}
        		},
			});
		}
     });
   </script>';
}

add_action('admin_head', 'insertScripts');
?>