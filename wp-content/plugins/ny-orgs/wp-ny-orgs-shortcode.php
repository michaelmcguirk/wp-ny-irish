<?php

//Creating shortcode that displays a list of all organisations. Organisations are stored in the Organistion post type.
function nyi_list_all_orgs( $atts, $content = null ) {
	
/*	if ( ! isset( $atts['location'] ) ) {
		return '<p class="job-error">You must provide a location for this shortcode to work.</p>'; 
	}*/
	$atts = shortcode_atts( array(
                'title'      => 'Current Job Openings in',
                'count'      => 2,
                'location'   => '',
                'pagination' => 'on'
        ), $atts );
	$pagination = $atts[ 'pagination' ]  == 'on' ? false : true;
	$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $args = array(
            'post_type' 		=> 'organisation',
            'post_status'       => 'publish',
            'no_found_rows'     => $pagination,
            'posts_per_page'    => $atts[ 'count' ],
            'paged'			    => $paged,
            'order'             => 'ASC',
            'orderby'           => 'title'
    );
    $orgs = new WP_Query( $args );

    if ( $orgs-> have_posts() ) :

        //Display title
/*    	$location = str_replace( '-', ' ', $atts['location'] );
    	$display = '<div id="jobs-by-location">';
    	$display .= '<h4>' . esc_html__( $atts[ 'title' ] ) . '&nbsp' . esc_html__( ucwords( $location ) ) . '</h4>';
        $display .= '<ul>';	
*/
        //Display each individual post
        $display = '<div>';
        while ( $orgs->have_posts() ) : $orgs->the_post();
        	global $post;
        	
        	$title = get_the_title();
        	$slug = get_permalink();
            $org_description = get_post_meta( get_the_ID(), 'org_description', true );
            $display .= '<div id="org-listing">';

            $display .= sprintf( '<h2><u><a href="%s">%s</a></u></h2>', esc_url( $slug ), esc_html__( $title ) );
            $display .= sprintf( '<p><i>%s</i></p>', esc_html__( $org_description ) );

            $display .= '</div>';
        endwhile;
    //$display .= '</ul>';
    $display .= '</div>';
    else:
    	$display = sprintf( __( '<p class="job-error">Sorry, no jobs listed in %s where found.</p>' ), esc_html__( ucwords( str_replace( '-', ' ', $atts[ 'location' ] ) ) ) );
    endif;
    wp_reset_postdata();
    if ( $orgs->max_num_pages > 1  && is_page() ) {
    	$display .= '<nav class="prev-next-posts">';
    	$display .= '<div call="nav-pervious">';
    	$display .= get_next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous' ), $orgs->max_num_pages );
    	$display .= '</div';
    	$display .= '<div class="next-posts-link">';
    	$display .= get_previous_posts_link( __( '<span class="meta-nav">&rarr;</span> Next' ) );
    	$display .= '</div>';
    	$display .= '</nav>';
    }
    return $display;
}
add_shortcode( 'orgs', 'nyi_list_all_orgs' );