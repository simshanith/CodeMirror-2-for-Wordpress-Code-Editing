<?php
/*
Plugin Name: CodeMirror Highlighting for theme/plugin editor
Plugin URI: http://codemirror.net
Description: Adds syntax highlighting for the in-dashboard editor
Version: 1.0
Author: Shane Daniel
Author URI: http://simloovoo.com
License: GPL2
*/

function codemirror_scripts( $hook ){

	if ($hook != 'theme-editor.php' && $hook != 'plugin-editor.php') return;

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'cm-lib-codemirror', plugins_url('/lib/codemirror.js', __FILE__ ) );
	wp_enqueue_script( 'cm-mode-xml', plugins_url('/mode/xml/xml.js', __FILE__ ) );
	wp_enqueue_script( 'cm-mode-javascript', plugins_url('/mode/javascript/javascript.js', __FILE__ ) );
	wp_enqueue_script( 'cm-mode-css', plugins_url('/mode/css/css.js', __FILE__ ) );
	wp_enqueue_script( 'cm-mode-clike', plugins_url('/mode/clike/clike.js', __FILE__ ) );
	wp_enqueue_script( 'cm-mode-php', plugins_url('/mode/php/php.js', __FILE__ ) );

	wp_enqueue_script( 'codemirror-init', plugins_url('/plugin.js', __FILE__ ) );

 	wp_enqueue_style( 'codemirror-docs', plugins_url('/lib/codemirror.css', __FILE__ ) );
//	wp_enqueue_style( 'codemirror-default', plugins_url('/theme/default.css', __FILE__ ) );
 	wp_enqueue_style( 'codemirror-elegant', plugins_url('/theme/elegant.css', __FILE__ ) );
// 	wp_enqueue_style( 'codemirror-neat', plugins_url('/theme/neat.css', __FILE__ ) );
// 	wp_enqueue_style( 'codemirror-night', plugins_url('/theme/night.css', __FILE__ ) );

	wp_enqueue_style( 'codemirror-init', plugins_url('/plugin.css', __FILE__ ) );
}

add_action('admin_enqueue_scripts', 'codemirror_scripts');
