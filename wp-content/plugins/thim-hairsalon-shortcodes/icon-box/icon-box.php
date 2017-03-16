<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * include template
 */
include_once 'tpl/default.php';


/**
 * Map shortcode
 */
vc_map(
	array(
		'name'                    => esc_html__( 'Thim Icon Box', 'hairsalon' ),
		'base'                    => 'thim-icon-box',
		'category'                => esc_html__( 'Thim Shortcodes', 'hairsalon' ),
		'description'             => esc_html__( 'Display icon box with image or icon.', 'hairsalon' ),
		'controls'                => 'full',
		'show_settings_on_create' => true,
		'params'                  => array(

			// Title
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Title', 'hairsalon' ),
				'param_name'  => 'title',
				'admin_label' => true,
				'value'       => esc_html__( 'This is an icon box.', 'hairsalon' ),
				'description' => esc_html__( 'Provide the title for this icon box.', 'hairsalon' ),
			),

			//Use custom or default title?
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Use custom or default title?', 'hairsalon' ),
				'param_name'  => 'title_custom',
				'value'       => array(
					esc_html__( 'Default', 'hairsalon' ) => '',
					esc_html__( 'Custom', 'hairsalon' )  => 'custom',
				),
				'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'hairsalon' )
			),
			//Heading
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Heading element', 'hairsalon' ),
				'param_name'  => 'heading_tag',
				'value'       => array(
					'h3' => 'h3',
					'h2' => 'h2',
					'h4' => 'h4',
					'h5' => 'h5',
					'h6' => 'h6',
				),
				'description' => esc_html__( 'Choose heading type of the title.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title color
			array(
				'type'        => 'colorpicker',
				'admin_label' => true,
				'heading'     => esc_html__( 'Title color ', 'hairsalon' ),
				'param_name'  => 'title_color',
				'value'       => '#333333',
				'description' => esc_html__( 'Select the title color.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title size
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Title size ', 'hairsalon' ),
				'param_name'  => 'title_size',
				'min'         => 0,
				'value'       => '',
				'suffix'      => 'px',
				'description' => esc_html__( 'Select the title size.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title weight
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Title weight ', 'hairsalon' ),
				'param_name'  => 'title_weight',
				'value'       => array(
					esc_html__( 'Choose the title font weight', 'hairsalon' ) => '',
					esc_html__( 'Normal', 'hairsalon' )                       => 'normal',
					esc_html__( 'Bold', 'hairsalon' )                         => 'bold',
					esc_html__( 'Bolder', 'hairsalon' )                       => 'bolder',
					esc_html__( 'Lighter', 'hairsalon' )                      => 'lighter',
				),
				'description' => esc_html__( 'Select the title weight.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			//Title style
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Title style ', 'hairsalon' ),
				'param_name'  => 'title_style',
				'value'       => array(
					esc_html__( 'Choose the title font style', 'hairsalon' ) => '',
					esc_html__( 'Italic', 'hairsalon' )                      => 'italic',
					esc_html__( 'Oblique', 'hairsalon' )                     => 'oblique',
					esc_html__( 'Initial', 'hairsalon' )                     => 'initial',
					esc_html__( 'Inherit', 'hairsalon' )                     => 'inherit',
				),
				'description' => esc_html__( 'Select the title style.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'title_custom',
					'value'   => 'custom',
				),
			),
			// Description
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => esc_html__( 'Description', 'hairsalon' ),
				'param_name'  => 'description',
				'description' => esc_html__( 'Provide the description for this icon box.', 'hairsalon' )
			),
			//Use custom or default description ?
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Use custom or default description?', 'hairsalon' ),
				'param_name'  => 'description_custom',
				'value'       => array(
					esc_html__( 'Default', 'hairsalon' ) => '',
					esc_html__( 'Custom', 'hairsalon' )  => 'custom',
				),
				'description' => esc_html__( 'If you select default you will use default description which customized in typography.', 'hairsalon' )
			),

			//Description color
			array(
				'type'        => 'colorpicker',
				'admin_label' => true,
				'heading'     => esc_html__( 'Description color ', 'hairsalon' ),
				'param_name'  => 'description_color',
				'value'       => '#777777',
				'description' => esc_html__( 'Select the description color.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description size
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Description size ', 'hairsalon' ),
				'param_name'  => 'description_size',
				'min'         => 0,
				'value'       => '',
				'suffix'      => 'px',
				'description' => esc_html__( 'Select the description size.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description weight
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Description weight ', 'hairsalon' ),
				'param_name'  => 'description_weight',
				'value'       => array(
					esc_html__( 'Choose the description font weight', 'hairsalon' ) => '',
					esc_html__( 'Normal', 'hairsalon' )                             => 'normal',
					esc_html__( 'Bold', 'hairsalon' )                               => 'bold',
					esc_html__( 'Bolder', 'hairsalon' )                             => 'bolder',
					esc_html__( 'Lighter', 'hairsalon' )                            => 'lighter',
				),
				'description' => esc_html__( 'Select the description weight.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			//Description style
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Description style ', 'hairsalon' ),
				'param_name'  => 'description_style',
				'value'       => array(
					esc_html__( 'Choose the description font style', 'hairsalon' ) => '',
					esc_html__( 'Italic', 'hairsalon' )                            => 'italic',
					esc_html__( 'Oblique', 'hairsalon' )                           => 'oblique',
					esc_html__( 'Initial', 'hairsalon' )                           => 'initial',
					esc_html__( 'Inherit', 'hairsalon' )                           => 'inherit',
				),
				'description' => esc_html__( 'Select the description style.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'description_custom',
					'value'   => 'custom',
				),
			),
			// Icon type
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Icon type', 'hairsalon' ),
				'value'       => array(
					esc_html__( 'Choose icon type', 'hairsalon' ) => '',
					esc_html__( 'Single Image', 'hairsalon' )     => 'image',
					esc_html__( 'Font Awesome', 'hairsalon' )     => 'fontawesome',
					esc_html__( 'Openiconic', 'hairsalon' )       => 'openiconic',
					esc_html__( 'Typicons', 'hairsalon' )         => 'typicons',
					esc_html__( 'Entypo', 'hairsalon' )           => 'entypo',
					esc_html__( 'Linecons', 'hairsalon' )         => 'linecons',
				),
				'admin_label' => true,
				'param_name'  => 'icon_type',
				'description' => esc_html__( 'Select icon type.', 'hairsalon' ),
			),

			// Icon type: Image - Image picker
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Choose image', 'hairsalon' ),
				'param_name'  => 'icon_image',
				'admin_label' => true,
				'value'       => '',
				'description' => esc_html__( 'Upload the custom image icon.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'image',
				),
			),
			//Image size
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Image size', 'hairsalon' ),
				'param_name'  => 'image_size',
				'admin_label' => true,
				'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'hairsalon' ),

				'dependency' => array(
					'element' => 'icon_type',
					'value'   => 'image',
				),
			),


			// Icon type: Fontawesome - Icon picker
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'hairsalon' ),
				'param_name'  => 'icon_fontawesome',
				'value'       => 'fa fa-heart',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'fontawesome',
				),
				'description' => esc_html__( 'FontAwesome library.', 'hairsalon' ),
			),

			// Icon type: Openiconic - Icon picker
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'hairsalon' ),
				'param_name'  => 'icon_openiconic',
				'value'       => 'vc-oi vc-oi-dial',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'openiconic',
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'openiconic',
				),
				'description' => esc_html__( 'Openiconic library.', 'hairsalon' ),
			),

			// Icon type: Typicons - Icon picker
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'hairsalon' ),
				'param_name'  => 'icon_typicons',
				'value'       => 'typcn typcn-adjust-brightness',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'typicons',
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'typicons',
				),
				'description' => esc_html__( 'Typicons library.', 'hairsalon' ),
			),

			// Icon type: Entypo - Icon picker
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'hairsalon' ),
				'param_name'  => 'icon_entypo',
				'value'       => 'entypo-icon entypo-icon-note',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'entypo',
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'entypo',
				),
				'description' => esc_html__( 'Entypo library.', 'hairsalon' ),
			),

			// Icon type: Lincons - Icon picker
			array(
				'type'        => 'iconpicker',
				'heading'     => esc_html__( 'Icon', 'hairsalon' ),
				'param_name'  => 'icon_linecons',
				'value'       => '',
				'settings'    => array(
					'emptyIcon'    => false,
					'iconsPerPage' => 50,
					'type'         => 'linecons',
				),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => 'linecons',
				),
				'description' => esc_html__( 'Linecons library.', 'hairsalon' ),
			),

			//Icon size
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Icon size', 'hairsalon' ),
				'param_name'  => 'icon_size',
				'value'       => 40,
				'min'         => 16,
				'max'         => 100,
				'suffix'      => 'px',
				'description' => esc_html__( 'Select the icon size.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' ),
				),
			),

			//Icon width
			array(
				'type'        => 'number',
				'admin_label' => true,
				'heading'     => esc_html__( 'Icon width', 'hairsalon' ),
				'param_name'  => 'icon_width',
				'value'       => 40,
				'min'         => 16,
				'max'         => 500,
				'suffix'      => 'px',
				'description' => esc_html__( 'Select the icon width.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => array( 'image', 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' ),
				),
			),

			// Icon layout
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Icon layout', 'hairsalon' ),
				'param_name'  => 'icon_layout',
				'value'       => array(
					esc_html__( 'Icon at left', 'hairsalon' )       => '',
					esc_html__( 'Icon at right', 'hairsalon' )      => 'icon-right',
					esc_html__( 'Icon at top center', 'hairsalon' ) => 'icon-top',
				),
				'description' => esc_html__( 'Select the icon layout.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => array( 'image', 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' ),
				),
			),

			//Icon color
			array(
				'type'        => 'colorpicker',
				'heading'     => esc_html__( 'Icon color', 'hairsalon' ),
				'param_name'  => 'icon_color',
				'value'       => '#89BA49',
				'description' => esc_html__( 'Select the icon color.', 'hairsalon' ),
				'dependency'  => array(
					'element' => 'icon_type',
					'value'   => array( 'fontawesome', 'openiconic', 'typicons', 'entypo', 'linecons' ),
				),
			),
			//Text Alignment
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Text alignment', 'hairsalon' ),
				'param_name'  => 'alignment',
				'value'       => array(
					esc_html__( 'Choose the text alignment', 'hairsalon' ) => '',
					esc_html__( 'Text at left', 'hairsalon' )              => 'left',
					esc_html__( 'Text at center', 'hairsalon' )            => 'center',
					esc_html__( 'Text at right', 'hairsalon' )             => 'right',
				),
			),
			// Animation
			array(
				'type'        => 'dropdown',
				'admin_label' => true,
				'heading'     => esc_html__( 'Animation', 'hairsalon' ),
				'param_name'  => 'css_animation',
				'value'       => array(
					esc_html__( 'No', 'hairsalon' )                 => '',
					esc_html__( 'Top to bottom', 'hairsalon' )      => 'top-to-bottom',
					esc_html__( 'Bottom to top', 'hairsalon' )      => 'bottom-to-top',
					esc_html__( 'Left to right', 'hairsalon' )      => 'left-to-right',
					esc_html__( 'Right to left', 'hairsalon' )      => 'right-to-left',
					esc_html__( 'Appear from center', 'hairsalon' ) => 'appear'
				),
				'description' => esc_html__( 'Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'hairsalon' )
			),
			// Extra class
			array(
				'type'        => 'textfield',
				'admin_label' => true,
				'heading'     => esc_html__( 'Extra class', 'hairsalon' ),
				'param_name'  => 'el_class',
				'value'       => '',
				'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'hairsalon' ),
			),
		)
	)
);

