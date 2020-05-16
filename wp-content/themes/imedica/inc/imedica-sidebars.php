<?php
/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since iMedica 1.0
 */
function imedica_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'imedica' ),
		'id'            => 'sidebar-main',
		'description'   => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'imedica' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Appears on the left side of the page content.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'imedica' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'Appears on the right side of the page content.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 1', 'imedica' ),
		'id'            => 'sidebar-footer-1',
		'description'   => __( 'Appears in footer sidebar widget area at first position.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 2', 'imedica' ),
		'id'            => 'sidebar-footer-2',
		'description'   => __( 'Appears in footer sidebar widget area at second position.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 3', 'imedica' ),
		'id'            => 'sidebar-footer-3',
		'description'   => __( 'Appears in footer sidebar widget area at third position.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area 4', 'imedica' ),
		'id'            => 'sidebar-footer-4',
		'description'   => __( 'Appears in footer sidebar widget area at fourth position.', 'imedica' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'imedica_widgets_init' );
