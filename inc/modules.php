<?php

function insert_modules() {
echo '<section id="modules">';

    if( have_rows('modules') ):
       while ( have_rows('modules') ) : the_row();

         $row = get_row_layout();

         // ACF rows utilise underscores so I'm converting these to keep consistency in php filenames (Avoiding examples like layout-big_module.php)
         $row = str_replace('_', '-', $row);

         get_template_part( 'inc/modules/layout', $row );


       endwhile;
    else :

    endif;

echo '</section>';
}
// small function, adds a class in the format section-layout based on module name
// underscores are automatically converted to hyphens, so latest_posts would have a class of section-latest-posts
function get_section_class() {

	$sectionClass =  get_row_layout();
	$sectionClass = str_replace('_', '-', $sectionClass);
	$sectionClass =  "section-" . $sectionClass;

	return $sectionClass;
}

function insert_sidebar_modules() {
echo '<section id="sidebar-modules">';

    if( have_rows('sidebar_modules') ):
       while ( have_rows('sidebar_modules') ) : the_row();

         $row = get_row_layout();

         // ACF rows utilise underscores so I'm converting these to keep consistency in php filenames (Avoiding examples like layout-big_module.php)
         $row = str_replace('_', '-', $row);

         get_template_part( 'inc/modules/layout', $row );


       endwhile;
    else :

    endif;

echo '</section>';
}


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'field_group_modules',
	'title' => 'Modules',
	'fields' => array(
		array(
			'key' => 'field_modules',
			'label' => 'Modules',
			'name' => 'modules',
			'type' => 'flexible_content',
			'layouts' => array(
        // Accordion Module, Fullwidth
        'layout_accordion' => array(
          'key' => 'layout_accordion',
          'name' => 'accordion',
          'label' => 'Accordion',
          'display' => 'block',
          'sub_fields' => array(
            array(
            			'key' => 'field_accordion_repeater',
            			'label' => 'Accordion Items',
            			'name' => 'accordion_repeater',
            			'type' => 'repeater',
            			'layout' => 'table',
            			'sub_fields' => array(
            				array(
            					'key' => 'field_accordion_repeater_title',
            					'label' => 'Accordion Title',
            					'name' => 'accordion_repeater_title',
            					'type' => 'text',
            				),
                    array(
                      'key' => 'field_accordion_repeater_content',
                      'label' => 'Accordion Content',
                      'name' => 'accordion_repeater_content',
                      'type' => 'wysiwyg',
                    ),
                    array(
                      'key' => 'field_accordion_repeater_media',
                      'label' => 'Accordion Media',
                      'name' => 'accordion_repeater_media',
                      'type' => 'select',
                      'choices' => array(
                        'none'	=> 'None',
                        'image'	=> 'Image',
                        'video'	=> 'Video'
                      ),
                    ),
                    array(
                      'key' => 'field_accordion_repeater_video',
                      'label' => 'Accordion Video Source',
                      'name' => 'accordion_repeater_video',
                      'type' => 'text',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_accordion_repeater_media',
                            'operator' => '==',
                            'value' => 'video',
                          ),
                        ),
                      ),
                    ),
                    array(
                      'key' => 'field_accordion_repeater_image',
                      'label' => 'Accordion Image',
                      'name' => 'accordion_repeater_image',
                      'type' => 'image',
                      'conditional_logic' => array(
                        array(
                          array(
                            'field' => 'field_accordion_repeater_media',
                            'operator' => '==',
                            'value' => 'image',
                          ),
                        ),
                      ),
                    ),
            			),
            		),
              ),
            ),
        // Contact From Module, Fullwidth
				'layout_contact_form' => array(
					'key' => 'layout_contact_form',
					'name' => 'contact_form',
					'label' => 'Contact Form',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_form_title',
							'label' => 'Form Title',
							'name' => 'form_title',
							'type' => 'text',
							'media_upload' => 0,
						),
            array(
              'key' => 'field_form_shortcode',
              'label' => 'Form Shortcode',
              'name' => 'form_shortcode',
              'type' => 'text',
              'media_upload' => 0,
            ),
					),
				),
        // Gridded content Module, Fullwidth
        'layout_grid_content' => array(
          'key' => 'layout_grid_content',
          'name' => 'grid_content',
          'label' => 'Grid',
          'display' => 'block',
          'sub_fields' => array(
            array(
              'key' => 'grid_content_title',
              'label' => 'Title (Optional)',
              'name' => 'grid_content_title',
              'type' => 'text',
              'instructions' => '',
            ),
            array(
                  'key' => 'field_grid_content_repeater',
                  'label' => 'Buttons',
                  'name' => 'grid_content_repeater',
                  'type' => 'repeater',
                  'layout' => 'table',
                  'sub_fields' => array(
                    array(
                      'key' => 'field_grid_content_repeater_image',
                      'label' => 'Grid Item Image',
                      'name' => 'grid_content_repeater_image',
                      'type' => 'image',
                      'required' => 0,
                      'return_format' => 'array',
                    ),
                    array(
                      'key' => 'field_grid_content_repeater_title',
                      'label' => 'Grid Item Title',
                      'name' => 'grid_content_repeater_title',
                      'type' => 'text',
                      'required' => 0,
                    ),
                    array(
                      'key' => 'field_grid_content_repeater_text',
                      'label' => 'Grid Item Text/Caption',
                      'name' => 'grid_content_repeater_text',
                      'type' => 'wysiwyg',
                      'required' => 0,
                    ),
                    array(
                      'key' => 'field_grid_content_repeater_link',
                      'label' => 'Grid Item Link',
                      'name' => 'grid_content_repeater_link',
                      'type' => 'link',
                      'required' => 0,
                      'return_format' => 'url',
                    ),
                  ),
              ),
          ),
        ),
        // Image, Fullwidth
				'layout_image' => array(
					'key' => 'layout_image',
					'name' => 'image',
					'label' => 'Image',
					'display' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_image_image',
							'label' => 'Image',
							'name' => 'image_image',
							'type' => 'image',
							'instructions' => '',
							'return_format' => 'array',
						),
            array(
              'key' => 'field_image_text',
              'label' => 'Caption/introductory text',
              'name' => 'image_text',
              'type' => 'wysiwyg',
              'instructions' => '',
            ),
            array(
              'key' => 'field_image_lightbox',
              'label' => 'Lightbox',
              'name' => 'image_lightbox',
              'type' => 'true_false',
              'instructions' => 'Enable lightbox for image (Note: May encounter problems when applied to two occurences of the same image on the same page)',
            ),
					),
				),
      // Latest news Module, Fullwidth
      'layout_latest_posts' => array(
        'key' => 'layout_latest_posts',
        'name' => 'latest_posts',
        'label' => 'Latest Posts',
        'display' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_latest_posts_image',
            'label' => 'Background Image',
            'name' => 'latest_posts_image',
            'type' => 'image',
            'media_upload' => 0,
            'return_format' => 'array',
          ),
          array(
            'key' => 'field_latest_posts_type',
            'label' => 'Post Type',
            'name' => 'latest_posts_type',
            'type' => 'select',
            'media_upload' => 0,
            // Choices are populated by acf_load_post_types below
            'choices' => array(
            ),
          ),
          array(
            'key' => 'field_latest_posts_number',
            'label' => 'Items to show',
            'name' => 'latest_posts_number',
            'type' => 'number',
          ),
        ),
      ),
      // Quote Module, Fullwidth
      'layout_quote' => array(
        'key' => 'layout_quote',
        'name' => 'quote',
        'label' => 'Quote',
        'display' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_quote_text',
            'label' => 'Quote',
            'name' => 'quote_text',
            'type' => 'wysiwyg',
            'media_upload' => 0,
          ),
          array(
            'key' => 'field_quote_name',
            'label' => 'Name',
            'name' => 'quote_name',
            'type' => 'text',
            'media_upload' => 0,
          ),
        ),
      ),
      // Text WYSIWYG Module, Fullwidth
      'layout_text' => array(
        'key' => 'layout_text',
        'name' => 'text',
        'label' => 'Text',
        'display' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_text_text',
            'label' => 'Content',
            'name' => 'text_text',
            'type' => 'wysiwyg',
            'media_upload' => 0,
          ),
          array(
            'key' => 'field_text_size',
            'label' => 'Text Size',
            'name' => 'text_size',
            'type' => 'select',
            'instructions' => 'This setting can be used for introductory paragraphs (large text)',
            'choices' => array(
              'standard' => 'Standard',
              'large' => 'Large',
            ),
          ),
        ),
      ),
      // Video Module, Fullwidth
      'layout_video' => array(
        'key' => 'layout_video',
        'name' => 'video',
        'label' => 'Video',
        'display' => 'block',
        'sub_fields' => array(
          array(
            'key' => 'field_video_video_url',
            'label' => 'Video Url',
            'name' => 'video_video_url',
            'type' => 'text',
            'required' => 1,
          ),
        ),
      ),

      // End layouts
			'button_label' => 'Add Row',
		),
    ),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'field_group_sidebar_modules',
	'title' => 'Sidebar Modules',
	'fields' => array(
		array(
			'key' => 'field_sidebar_modules',
			'label' => 'Sidebar Modules',
			'name' => 'sidebar_modules',
			'type' => 'flexible_content',
			'layouts' => array(
      // End layouts
			'button_label' => 'Add Row',
		),
    ),
	),
  'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'page-templates/right-sidebarpage.php',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;


// Page Title options
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_page_title',
	'title' => 'Page Title Options',
	'fields' => array(
		array(
			'key' => 'field_page_title_enable',
			'label' => 'Enable Page Title',
			'name' => 'page_title_enable',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_page_title_background',
			'label' => 'Page Title Background',
			'name' => 'page_title_background',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_page_title_enable',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
		),
		array(
			'key' => 'field_page_title_title',
			'label' => 'Page Title (optional)',
			'name' => 'page_title_title',
			'type' => 'text',
			'instructions' => 'Page title will default to the name of the page, but can be overwritten here',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_page_title_enable',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_page_title_description',
			'label' => 'Page Description (optional)',
			'name' => 'page_title_description',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_page_title_enable',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

// Dynamically add post types to field 'latest_posts_type''
add_filter('acf/load_field/name=latest_posts_type', 'acf_load_post_types');

function acf_load_post_types($field)
{
    foreach ( get_post_types( '', 'names' ) as $post_type ) {
       $field['choices'][$post_type] = $post_type;
    }

    // return the field
    return $field;
}


?>
