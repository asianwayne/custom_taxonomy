<?php 

/**
@ https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
@ https://developer.wordpress.org/reference/functions/register_taxonomy/
#######　　non-hierarchical taxonomies (like tags) and the second one is for hierarchical taxonomies (like categories).
*/
add_action('init','register_custom_taxonomies');

function register_custom_taxonomies() {

	$args == array(
		'labels'  => array(   // 分类类型的标签 By default, Tag labels are used for non-hierarchical taxonomies, and Category labels are used for hierarchical taxonomies.
			'name'  => 'linktypes',  //统一默认名称， 通常是复数， 等同于 $tax->label 。默认是Tags'/'Categories。 
			'singular_name'  => 'linktype', //单数名称
			'search_items'  => 'Search LinkTypes',  //Default 'Search Tags'/'Search Categories'.
			'popular_items'  => 'Popular Tags',  //只用在non-hierarchical 分类上。 
			'all_items'  => 'All linktypes', //(string) Default 'All Tags'/'All Categories'.
			'parent_item'  => 'Parent linktype', // 只对hierarchical分类有用，如category
			'parent_item_colon'  => __( 'Parent Category:' ), //同上 只是多了一个 colon 多了一个冒号：
			'edit_item'  => 'Edit LinkType',  //编辑单个分类 
			'view_item'  => 'View LinkType',
			'update_item'  => 'Update LinkType',
			'add_new_item'  => 'Add New LinkType',
			'new_item_name'  => 'New LinkType Name',
			'separate_items_with_commas'  => 'Seprate Linktypes with commas',  //只对non hierachical 如 tag有用。
			'add_or_remove_items'  => 'Add or remove Linktypes', // non h 分类如tag有用
			'choose_from_most_used'  => 'Choose from the most used linktype',   //non h 分类 如tag 有用
			'not_found' => 'No linktype found',  // (string) Default 'No tags found'/'No categories found', used in the meta box and taxonomy list table.
			'no_terms'  => 'No linktypes',   // 在posts和media list tables里面使用
			'items_list_navigation'  => '',  //(string) Label for the table pagination hidden heading.
			'items_list'  => '',  //(string) Label for the table hidden heading.
			'most_used'  => '',  //(string) Title for the Most Used tab. Default 'Most Used'.
			'back_to_items'  => '',   // Linktypes 。 term更新之后展示的标签。 

		),

		'description'  => 'Linktype taxonomy',
		'public'  => true,  // 等同于 post type 的public,  值传递给 $publicly_queryable, $show_ui, and $show_in_nav_menus
		'publicly_queryable'  => true, //从public继承， 是否设置分类公开可查询。 
		'hierarchical'  => false, //是否设置有分级，如category一样有子分类。 默认是 否。 
		'show_ui'  => true,  // 是否在管理页面展现可 用来管理，默认是$public值
		'show_in_menu'  => true,  //是否在管理页面左侧菜单展示，选择在管理左侧文章分类子菜单上显示。 要起作用， $show_ui要设置为true, 依附于show ui. 默认值是$show_ui的值。
		'show_in_nav_menus'  => true,  //设置文章类型可以在菜单选择页面那里可以被设置为菜单。  默认值为public的值。
		'show_in_rest'  => true, //是否把分类包含到rest api, 设置为true的话就可启用古腾堡板块编辑器。 设置true可以通过rest url查询并调用。
		'rest_base'  => $taxonomy,  //更改rest api 路由的基础url。 默认是的 $taxonomy，
		'rest_controller_class'  =>  'WP_REST_Terms_Controller'，  //(string) REST API Controller class name
		'show_tagcloud'  => true,   //是否在tag cloud 小工具中添加这个分类、。 如果没有设置，。默认值继承自show_ui 
		'show_in_quick_edit'  => true,   //是否显示分类在快递和批量编辑面板，  默认值继承自show_ui
		'show_admin_column'  => false, //是否在绑定的post type 列表上添加一个分类的列。 默认是false. 
		'meta_box_cb'  => post_categories_meta_box(),  //回调函数，没有设置的话默认是 post_categories_meta_box() is used for hierarchical taxonomies, and post_tags_meta_box() is used for non-hierarchical.如果设置false,则没有 meta_box会展示、
		'meta_box_sanitize_cb'  => ''， //分类数据从meta_box保存时候的过滤回调函数。 如果没有定义，默认就会根据数据类型来调用自带
		'capabilities'  => array('manage_terms','edit_terms','delete_terms','assign_terms'),  //默认就是四个都有， 设置编辑权限
		'rewrite'  => array('slug'  => 'Links'),  //重写，默认是true, 用$taxonomy 当作slug. To prevent rewrite, set to false.重写时通过数组：
		/* 'slug'
(string) Customize the permastruct slug. Default $taxonomy key.
'with_front'
(bool) Should the permastruct be prepended with WP_Rewrite::$front. Default true.
'hierarchical'
(bool) Either hierarchical rewrite tag or not. Default false.
'ep_mask'
(int) Assign an endpoint mask. Default EP_NONE. */

	'query_var'  => $taxonomy,  // Default $taxonomy key. If false, a taxonomy cannot be loaded at ?{query_var}={term_slug}. If a string, the query ?{query_var}={term_slug} will be valid.
	'update_count_callback'  =>   //(callable) Works much like a hook, in that it will be called when the count is updated. Default _update_post_term_count() for taxonomies attached to post types, which confirms that the objects are published before counting them. Default _update_generic_term_count() for taxonomies attached to other object types, such as users.
	'default_term'  => array()  //'name'
// (string) Name of default term.
// 'slug'
// (string) Slug for default term.
// 'description'
// (string) Description for default term.
	'_builtin'  => 




	);
	register_taxonomy('link-type','weblinks',$args);
}