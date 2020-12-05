<?php
/**
 * list-pages.php
 *
 * Copyright (c) 2020 www.itthinx.com
 *
 * This code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 *
 * This code is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This header and all notices must be kept intact.
 *
 * @author itthinx
 * @package list-pages
 * @since list-pages 1.0.0
 *
 * Plugin Name: List Pages
 * Plugin URI: https://www.itthinx.com/shop/
 * Description: Implements the [list-pages] shortcode that allows to list pages. Accepts the same arguments as for the <a href="https://developer.wordpress.org/reference/functions/get_pages/"><code>get_pages()</code></a> function which it uses to obtain pages.
 * Version: 1.0.0
 * Author: itthinx
 * Author URI: https://www.itthinx.com
 * Donate-Link: https://www.itthinx.com/shop/
 * Text Domain: list-pages
 * Domain Path: /languages
 * License: GPLv3
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

if ( !shortcode_exists( 'list-pages' ) ) {
	add_shortcode( 'list-pages', 'list_pages_shortcode' );
}

/**
 * Shortcode renderer.
 *
 * @param array $atts
 * @param string $content
 *
 * @return string
 */
function list_pages_shortcode( $atts, $content = '' ) {
	$pages = get_pages( $atts );
	$output = '<ul>';
	foreach ( $pages as $page ) {
		$url = get_permalink( $page->ID );
		$title = get_the_title( $page );
		if ( $url !== false ) {
			$output .= '<li>';
			$output .= sprintf( '<a href="%s">%s</a>', esc_url( $url ), esc_html( $title ) );
			$output .= '</li>';
		}
	}
	$output .= '</ul>';
	return $output;
}
