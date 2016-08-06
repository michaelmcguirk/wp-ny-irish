<?php
/*
================================================================================================
Beyond Expectations - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer
section of this theme.

@package        Beyond Expectations WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="content-area" class="content-area">
        <?php get_template_part('template-parts/content', 'none'); ?>
    </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>