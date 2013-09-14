<?php 
/** functions.php
*
* Volatyl Starter Child Theme functions
*/
 
// Load Volatyl's functions file immediately!
require_once( get_template_directory() . '/inc/init-functions.php' );
 
/*---- All custom PHP belongs BELOW THIS LINE! ----*/



/** 
 * Enqueue front-end child theme scripts and styles
 */
function child_front_scripts() {
	
	// Load default Volatyl stylesheet - don't remove... unless you don't want styles!
	wp_enqueue_style('child-style', THEME_STYLESHEET);
	
	// Load Google web fonts
    wp_register_style( 'gfonts', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700' );
    wp_enqueue_style( 'gfonts' );
}
add_action('wp_enqueue_scripts', 'child_front_scripts', 2);



/** Use filters to change hardcoded Volatyl text - http://volatylthemes.com/filters/
 *
 * Change byline static text
 */
function static_byline_text( $variable ) {
    $search = array( 'Published on', '&ndash;', 'Comments off', 'Filed under:' );
    $replace = array( '', '', 'Comments disabled', 'Topics:' );
    $variable = str_replace( $search, $replace, $variable );
    return $variable;
}
add_filter( 'byline_text', 'static_byline_text' );