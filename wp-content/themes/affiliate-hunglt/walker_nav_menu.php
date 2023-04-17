<?php
// Khai báo class My_Walker_Nav_Menu
class My_Walker_Nav_Menu extends Walker_Nav_Menu {

  // Override phương thức start_el để thêm class vào thẻ li
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'nav-item';
    $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

    // Check if current menu item is the current page
    $is_current = false;
    if (in_array('current-menu-item', $classes)) {
        $is_current = true;
    }

    $output .= "<li class='" . implode(' ', $classes) . "'>";
    $atts = array();
    $atts['title']  = ! empty( $item->title )   ? $item->title  : '';
    $atts['target'] = ! empty( $item->target )  ? $item->target : '';
    $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
    $atts['href']   = ! empty( $item->url )     ? $item->url    : '';
    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $depth);
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    // Add class "active" to the current menu item
    if ($is_current) {
        $attributes .= ' class="nav-link click-scroll active"';
    } else {
        $attributes .= ' class="nav-link click-scroll"';
    }

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    /** This filter is documented in wp-includes/post-template.php */
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
}
}
?>