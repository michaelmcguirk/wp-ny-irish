<?php
/*
================================================================================================
Beyond Expectations - content.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed.

@package        Splendid Portfolio WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?> 
    </header>
    <div class="metadata-content cf">
        <div class="entry-metadata">
            <?php beyond_expectations_entry_posted_on(); ?>
        </div>
        <div class="entry-content">
            <?php 
            $org_content = '<p><h2>Address</h2></p>';
            $org_content .= '<p>' . get_post_meta( get_the_ID(), 'address_1', true ) ;
            $org_content .= '<br>' . get_post_meta( get_the_ID(), 'address_2', true ) ;
            $org_content .= '<br>' . get_post_meta( get_the_ID(), 'city', true );
            $org_content .= '<br>' . get_post_meta( get_the_ID(), 'zip', true );
            $org_content .= '<br>' . get_post_meta( get_the_ID(), 'state', true );
            $org_content .= '<br>' . get_post_meta( get_the_ID(), 'country', true ) . '</p>';

            $org_content .= '<p><h2>Website</h2></p>';
            $org_content .= '<a href="' . esc_url(get_post_meta( get_the_ID(), 'website', true )) . '">' 
                            . esc_url(get_post_meta( get_the_ID(), 'website', true )) . '</a></h1>';
            
            echo $org_content;
            the_content(); ?>
            <?php wp_link_pages(); ?>
            <div class="entry-footer">
                <?php beyond_expectations_entry_taxonomies(); ?>
            </div>
        </div>
    </div>
</article>
<?php comments_template(); ?>