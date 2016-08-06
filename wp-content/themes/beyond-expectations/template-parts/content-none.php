<?php
/*
================================================================================================
Beyond Expectations - content-none.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
404 and Search as well as recent posts.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="archive-header">
        <h2 class="content-archive">
            <?php if (is_404()) {
                _e('Page Not Available', 'beyond-expectations');
            } else if (is_search()) {
                printf(__('Nothing found for: <small>', 'beyond-expectations') . get_search_query() . '</small>');
            } else {
                _e('Nothing Found', 'beyond-expectations');
            }
            ?>
        </h2>
    </header>
    <div class="entry-content full-width">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'beyond-expectations' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
        <?php elseif (is_404()) : ?>
            <p><?php printf(__( "You tried going to %s, which doesn't exist, so that means I probably broke something.", 'beyond-expectations'), '<code>' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</code>' ); ?></p>
            <?php get_search_form(); ?>
        <?php elseif (is_search()) : ?>
            <p><?php _e( 'Nothing matched your search terms. Check out the most recent articles below or try searching for something else:', 'beyond-expectations' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e( 'It seems we cannot find what you are looking for. Perhaps searching can help.', 'beyond-expectations' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>
<div class="recent-posts full-width">
    <?php if (is_404() || is_search()) { ?>
        <h3 class="recent-posts"><?php _e('Most Recent Posts', 'beyond-expectations'); ?></h3>
            <ul>
                <?php
                    $args = array('numberposts' => '10');
                    $recent_posts = wp_get_recent_posts($args);
                        foreach ($recent_posts as $recent) {
                            echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li>';
                        }
                ?>
            </ul>
    <?php
    }
    ?>
</div>