<?php
/*
================================================================================================
Beyond Expectations - comments.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required files to
display the comments for the theme.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://luminathemes.com/)
================================================================================================
*/
?>
<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments-area" class="comments-area">

<?php // You can start editing here -- including this comment! ?>

<?php if (have_comments()) : ?>
    <h2 class="comments-title">
            <?php
                    printf(_nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'beyond-expectations' ),
                            number_format_i18n( get_comments_number() ));
            ?>
    </h2>

    <ol class="comment-list">
            <?php
                    wp_list_comments( array(
                            'style'      => 'ol',
                            'short_ping' => true,
                            'avatar_size' => 50,
                    ) );
            ?>
    </ol><!-- .comment-list -->

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-below" class="comment-navigation cf" role="navigation">
            <div class="comment-previous"><?php previous_comments_link( '<i class="fa fa-arrow-circle-o-left"></i> ' . __( 'Older Comments', 'beyond-expectations' ) ); ?></div>
            <div class="comment-next"><?php next_comments_link( '<i class="fa fa-arrow-circle-o-right"></i> '.__( 'Newer Comments', 'beyond-expectations' ) ); ?></div>
    </nav>
    <?php endif; ?>

<?php endif; ?>
<?php comment_form(); ?>

</div>