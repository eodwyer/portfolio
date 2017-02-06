<?php
/*
Plugin Name: SVG Icons
Plugin URI: Local Host
Description: Adds icon fields to menu items
Version: 1.0
Author: Eoin O'Dwyer
Author URI: http://eoinodwyer.com
License: menuicons
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

/* menu meta field
*/

/**
*  Custom Menu Walker so can add icons
*/

class Icon_Walker extends Walker_Nav_Menu {

    var $number = 1;

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        // add svg icons here
         $themeDir = get_template_directory_uri();
         $theIcon = sprintf( '<svg class="icon icon-home" aria-labelledby="desc"><desc>Decorative Icon</desc></title><use xlink:href="'.plugins_url( 'fonts/symbol-defs.svg', __FILE__ ).'#'.esc_attr( $item->menuIcon ).'"></use></svg>');
        

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $theIcon;
        $item_output .= '<span>'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after . '</span>';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

// instantiate plugin's class
$GLOBALS['menuIcons'] = new mi_menuIcons();

//Add Form to menu
include_once( 'edit_custom_walker.php' );
//include_once( 'custom_walker.php' );

?>