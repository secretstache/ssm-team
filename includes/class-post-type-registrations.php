<?php
/**
 * SSM Team
 *
 * @package   SSM_Team
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Team
 */
class SSM_Team_Registrations {

	public $post_type = 'team';

	// public $taxonomies = array( 'team-category' );

	public function init() {
		// Add the SSM Team and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Team_Registrations::register_post_type()
	 * @uses SSM_Team_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Team', 'ssm-team' ),
			'singular_name'      => __( 'Team', 'ssm-team' ),
			'add_new'            => __( 'Add Team Member', 'ssm-team' ),
			'add_new_item'       => __( 'Add Team Member', 'ssm-team' ),
			'edit_item'          => __( 'Edit Team Member', 'ssm-team' ),
			'new_item'           => __( 'New Team Member', 'ssm-team' ),
			'view_item'          => __( 'View Team Member', 'ssm-team' ),
			'search_items'       => __( 'Search Team Members', 'ssm-team' ),
			'not_found'          => __( 'No team members found', 'ssm-team' ),
			'not_found_in_trash' => __( 'No team members in the trash', 'ssm-team' ),
		);

		$supports = array(
			'title',
			'thumbnail',
			'genesis-layouts',
			'genesis-seo'
		);

		$args = array(
			'labels'          => $labels,
			'supports'        => $supports,
			'public'          => true,
			'capability_type' => 'post',
			'rewrite'         => array( 'slug' => 'team', ), // Permalinks format
			'menu_position'   => 30,
			'menu_icon'       => 'dashicons-admin-page',
		);

		$args = apply_filters( 'ssm_team_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	// protected function register_taxonomy_category() {
	// 	$labels = array(
	// 		'name'                       => __( 'Collection Categories', 'ssm-team' ),
	// 		'singular_name'              => __( 'Collection Category', 'ssm-team' ),
	// 		'menu_name'                  => __( 'Collection Categories', 'ssm-team' ),
	// 		'edit_item'                  => __( 'Edit Collection Category', 'ssm-team' ),
	// 		'update_item'                => __( 'Update Collection Category', 'ssm-team' ),
	// 		'add_new_item'               => __( 'Add New Collection Category', 'ssm-team' ),
	// 		'new_item_name'              => __( 'New Collection Category Name', 'ssm-team' ),
	// 		'parent_item'                => __( 'Parent Collection Category', 'ssm-team' ),
	// 		'parent_item_colon'          => __( 'Parent Collection Category:', 'ssm-team' ),
	// 		'all_items'                  => __( 'All Collection Categories', 'ssm-team' ),
	// 		'search_items'               => __( 'Search Collection Categories', 'ssm-team' ),
	// 		'popular_items'              => __( 'Popular Collection Categories', 'ssm-team' ),
	// 		'separate_items_with_commas' => __( 'Separate collection categories with commas', 'ssm-team' ),
	// 		'add_or_remove_items'        => __( 'Add or remove collection categories', 'ssm-team' ),
	// 		'choose_from_most_used'      => __( 'Choose from the most used collection categories', 'ssm-team' ),
	// 		'not_found'                  => __( 'No collection categories found.', 'ssm-team' ),
	// 	);

	// 	$args = array(
	// 		'labels'            => $labels,
	// 		'public'            => true,
	// 		'show_in_nav_menus' => true,
	// 		'show_ui'           => true,
	// 		'show_tagcloud'     => true,
	// 		'hierarchical'      => true,
	// 		'rewrite'           => array( 'slug' => 'team-category' ),
	// 		'show_admin_column' => true,
	// 		'query_var'         => true,
	// 	);

	// 	$args = apply_filters( 'ssm_team_category_args', $args );

	// 	register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	// }
}