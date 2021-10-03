<?php
function meal_gallery_section_metabox( $metaboxes ) {
    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' != get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta( $section_id, 'meal-section-type', true );
    $section_type = $section_meta['type'];
    if ( 'gallery' != $section_type ) {
        return $metaboxes;
    }

    $metaboxes[] = [
        'id'        => 'meal-section-gallery',
        'title'     => __( 'Gallery Setting', 'meal' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => [
            [
                'name' => 'meal-section-gallery-one',
                'icon'   => 'fa fa-image',
                'fields' => [
                    [
                        'id'    => 'portfolio',
                        'title'   => __( 'Portfolio', 'meal' ),
                        'type'    => 'group',
                        'button_title'    => __('New Image','meal'),
                        'accordion_title' => __('Add New Image','meal'),
                        'fields' => [
                            [
                                'id'    => 'title',
                                'title' => __( 'Title', 'meal' ),
                                'type'  => 'text',
                            ],
                            [
                                'id'    => 'gallery_image',
                                'title' => __( 'gallery image', 'meal' ),
                                'type'  => 'image',
                            ],
                            [
                                'id'    => 'categories',
                                'title' => __( 'Categories', 'meal' ),
                                'type'  => 'text',
                            ],
                            
                        ]
                    ],
                    
                ],
            ],

        ],
    ];

    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'meal_gallery_section_metabox' );