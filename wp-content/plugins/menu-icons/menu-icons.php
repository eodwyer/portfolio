<?php
/*
Plugin Name: SVG Icons
Plugin URI: Local Host
Description: Adds icon fields to menu items
Version: 1.0
Author: Eoin O'Dwyer
Author URI: http://eoinodwyer.com
*/



class mi_menuIcons{

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/

	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {

		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'mi_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'mi_update_custom_nav_fields'), 10, 3 );
	
		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'mi_edit_walker'), 10, 2 );

	} // end constructor

	/* All functions will be placed here */

	/**
	 * Add custom fields to $item nav object
	 * in order to be used in custom Walker
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function mi_add_custom_nav_fields( $menu_item ) {
	    $menu_item->menuIcon = get_post_meta( $menu_item->ID, '_menu_item_menuIcon', true );
	    return $menu_item;
	}

	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function mi_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {

	    // Check if element is properly sent
	    if ( is_array( $_REQUEST['menu-item-menuIcon']) ) {
	        $menuIcon_value = $_REQUEST['menu-item-menuIcon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_menuIcon', $menuIcon_value );
	    }

	}

	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function mi_edit_walker($walker,$menu_id) {
	    return 'Walker_Nav_Menu_Edit_Custom';
	}

}

// instantiate plugin's class
$GLOBALS['menuIcons'] = new mi_menuIcons();

//Add Form to menu
include_once( 'edit_custom_walker.php' );
include_once('menu_custom_walker.php')

?>