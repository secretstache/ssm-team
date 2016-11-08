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

	public $taxonomies = array( 'departments' );

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
			'editor',
			'thumbnail',
			'genesis-layouts',
			'genesis-seo'
		);

		$args = array(
			'labels'          			=> $labels,
			'supports'        			=> $supports,
			'public'          			=> false,
			'capability_type' 			=> 'page',
			'publicly_queriable'		=> true,
			'show_ui' 							=> true,
			'show_in_nav_menus' 		=> false,
			'rewrite'         			=> false,
			'menu_position'   			=> 30,
			'menu_icon'       			=> 'dashicons-businessman',
			'has_archive'						=> false,
			'exclude_from_search'		=> true,
		);

		$args = apply_filters( 'ssm_team_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Departments', 'ssm-team' ),
			'singular_name'              => __( 'Department', 'ssm-team' ),
			'menu_name'                  => __( 'Departments', 'ssm-team' ),
			'edit_item'                  => __( 'Edit Department', 'ssm-team' ),
			'update_item'                => __( 'Update Department', 'ssm-team' ),
			'add_new_item'               => __( 'Add New Department', 'ssm-team' ),
			'new_item_name'              => __( 'New Department', 'ssm-team' ),
			'parent_item'                => __( 'Parent Department', 'ssm-team' ),
			'parent_item_colon'          => __( 'Parent Department:', 'ssm-team' ),
			'all_items'                  => __( 'All Departments', 'ssm-team' ),
			'search_items'               => __( 'Search Departments', 'ssm-team' ),
			'popular_items'              => __( 'Popular Departments', 'ssm-team' ),
			'separate_items_with_commas' => __( 'Separate departments with commas', 'ssm-team' ),
			'add_or_remove_items'        => __( 'Add or remove departments', 'ssm-team' ),
			'choose_from_most_used'      => __( 'Choose from the most used departments', 'ssm-team' ),
			'not_found'                  => __( 'No departments found.', 'ssm-team' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => false,
			'rewrite'           => false,
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'ssm_departments_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}