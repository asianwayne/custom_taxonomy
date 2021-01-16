# custom_taxonomy  WP教学QQ群： 706173813

/**
@ https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
@ https://developer.wordpress.org/reference/functions/register_taxonomy/
#######　　non-hierarchical taxonomies (like tags) and the second one is for hierarchical taxonomies (like categories).
*/
add_action('init','register_custom_taxonomies');

function register_custom_taxonomies() { register_taxonomy('link-type','weblinks',$args);
} 
