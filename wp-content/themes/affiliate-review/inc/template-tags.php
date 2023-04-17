<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Affiliate Review
 */

if ( ! function_exists( 'affiliate_review_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function affiliate_review_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'affiliate_review_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids 	 = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	wp_reset_postdata();

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function affiliate_review_categorized_blog() {
	if ( false === ( $affiliate_review_all_the_cool_cats = get_transient( 'affiliate_review_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$affiliate_review_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$affiliate_review_all_the_cool_cats = count( $affiliate_review_all_the_cool_cats );

		set_transient( 'affiliate_review_all_the_cool_cats', $affiliate_review_all_the_cool_cats );
	}

	if ( '1' != $affiliate_review_all_the_cool_cats ) {
		// This blog has more than 1 category so affiliate_review_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so affiliate_review_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'affiliate_review_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since affiliate-review
 */
function affiliate_review_the_custom_logo() {	
	the_custom_logo();
}
endif;

/**
 * Flush out the transients used in affiliate_review_categorized_blog
 */
function affiliate_review_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'affiliate_review_all_the_cool_cats' );
}
add_action( 'edit_category', 'affiliate_review_category_transient_flusher' );
add_action( 'save_post',     'affiliate_review_category_transient_flusher' );

add_theme_support( 'admin-bar', array( 'callback' => 'affiliate_review_my_admin_bar_css') );
function affiliate_review_my_admin_bar_css(){
?>
<style type="text/css" media="screen">	
	html body { margin-top: 0px !important; }
</style>
<?php
}

/*-- Custom metafield --*/
function affiliate_review_custom_price() {
  	add_meta_box( 'bn_meta', __( 'Affiliate Review Meta Feilds', 'affiliate-review' ), 'affiliate_review_meta_price_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'affiliate_review_custom_price');
}

function affiliate_review_meta_price_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'affiliate_review_price_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
  	$affiliate_review_price = get_post_meta( $post->ID, 'affiliate_review_price', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">
		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Starting Price', 'affiliate-review' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="affiliate_review_price" id="affiliate_review_price" value="<?php echo esc_html($affiliate_review_price); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function affiliate_review_save( $post_id ) {
  	if (!isset($_POST['affiliate_review_price_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['affiliate_review_price_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	}
  	if( isset( $_POST[ 'affiliate_review_price' ] ) ) {
    	update_post_meta( $post_id, 'affiliate_review_price', strip_tags( wp_unslash( $_POST[ 'affiliate_review_price' ]) ) );
  	}
}
add_action( 'save_post', 'affiliate_review_save' );