<?php
/*
================================================================================================
Beyond Expectations - index.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="content-area" class="content-area">
            <?php if (have_posts()) : ?>
                <div class="entry-header">
                    <h2 class="content-archive">
                        <?php if (is_search()) { ?>
                            <?php printf(__('Search for: <small>', 'beyond-expectations') . get_search_query() . '</small>'); ?>
                        <?php } ?>
                    </h2>
                </div>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'search'); ?>
        <?php endwhile; ?>
                <div class="paging-navigation">
                    <?php the_posts_pagination(); ?>
                </div>
        <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>