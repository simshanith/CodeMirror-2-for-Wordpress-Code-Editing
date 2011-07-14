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


function insertScripts($adminHead){
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
     margin-right: 0;
     height: auto;
     }
   </style>
   <script>
     jQuery(document).ready(function(){
       CodeMirror.fromTextArea(document.getElementById("newcontent"),
         {
         theme: "default",
         mode: "php",
         lineNumbers: true,
         });
     });
   </script>';
}

add_action('admin_head', 'insertScripts');
?>