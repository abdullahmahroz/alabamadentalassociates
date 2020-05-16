<?php
add_action( 'vc_before_init', 'imedica_init_gallery' );
function imedica_init_gallery() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_image_gallery extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map( array(
			'name'        => __( 'Image Gallery', "imedica" ),
			'base'        => 'imedica_image_gallery',
			"icon"        => get_template_directory_uri() . "/vc_templates/images/image_gallery.png",
			'class'       => 'imd_image_gallery',
			'category'    => 'iMedica',
			'weight'      => - 50,
			'description' => __( 'Display gallery of your images in a slider.', 'imedica' ),
			'params'      => array(
				array(
					'type'        => 'attach_images',
					'heading'     => __( 'Upload Images', 'imedica' ),
					'param_name'  => 'images',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra Class Name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => ''
				),
				array(
					"type"       => "ult_switch",
					"class"      => "",
					"heading"    => __( "Gallery Thumbnails", "smile" ),
					"param_name" => "enable_gallery_thumbnails",
					"value"      => "on",
					"default_set" => "true",
					"options"    => array(
						"on" => array(
							"label" => "Enable gallery thumbnails",
							"on"    => "Yes",
							"off"   => "No",
						),
					),
				),

			) // params
		) // vc_map - array
		); // vc_map()
	}
}