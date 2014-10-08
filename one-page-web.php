<?php
/*
Plugin Name: One Page Web
Plugin URI: http://www.subhi.ro
Description: Create a one page website from available posts 
Author: Anwar Subhi
Author URI: http://www.subhi.ro/
Version: 1.0
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/



// Add Shortcode
function box_post( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '',
			'height' => '',
			'id' => '',
			'bgcolor' => ''
		), $atts )
	);
	
	$post = get_post($id);
	$result = '<div id="'.$post->ID.'"
					class="box_post"
					style="width:'.$width.';height:'.$height.'; background-color:'.$bgcolor.'">';
	$result .= '<h2 style="line-height:'.$height.'; vertical-align:middle; text-align:center;">'.$post->post_title.'</h2>';
	$result .= '<p>'.$post->post_content.'</p>';
	$result .= '</div>';
	return $result;

}
add_shortcode( 'box-post', 'box_post' );



// Add Shortcode
function box_column( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => '100%'
		), $atts )
	);
	
	$result = '<div class="box_column" style="width:'.$width.';" >';
	$result .= do_shortcode($content);
	$result .= '</div>';
	return $result;
	
}
add_shortcode( 'box-column', 'box_column' );


// Add Shortcode
function box( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'width' => ''
		), $atts )
	);
	
	$result = '<div class="box" style="width:'.$width.';">';
	$result .= do_shortcode($content);
	$result .= '<div class="cls"></div>';
	$result .= '</div>';
	$result = str_replace("<br>", "", $result);
	return $result;

}
add_shortcode( 'box', 'box' );


/**
 * Proper way to enqueue scripts and styles
 */
function theme_name_scripts() {
	wp_enqueue_style ( 'one-box-page', plugin_dir_url(__FILE__) . 'css/style.css' );
	wp_enqueue_script( 'jquery-ui', plugin_dir_url(__FILE__) . '/js/jquery-ui.min.js', array(), '1.11.1', true );
	wp_enqueue_script( 'one-box-page', plugin_dir_url(__FILE__) . '/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );



function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpse_wpautop_nobr' );

?>