<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */
global $imedica_opts, $blog_layout, $cls;
if ( have_posts() ) :
	/* Start the Loop */
	while ( have_posts() ) : the_post();
		get_template_part( 'content', 'blogmedium' );
	endwhile;
endif;