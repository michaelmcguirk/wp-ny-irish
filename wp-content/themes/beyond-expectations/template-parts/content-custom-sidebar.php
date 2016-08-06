<?php
/*
================================================================================================
Azul Silver - content-custom-sidebar.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed.

@package        Azul Silver WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <div class="entry-content full-width">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    </div>
</article>
<?php comments_template(); ?>