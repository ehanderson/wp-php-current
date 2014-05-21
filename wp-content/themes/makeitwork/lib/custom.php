<?php
/**
 * Custom functions
 */


// Add SVG to allowed file uploads

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


// Utilize menu order for Issues, Campaigns, etc

function posts_menu_order($query) {
  if ($query->get('post_type') == ('issue' || 'campaign'))  {
    $query->set('orderby', 'menu_order');
    $query->set('order', 'ASC');
  }
  return $query;
}
add_filter('pre_get_posts', 'posts_menu_order');