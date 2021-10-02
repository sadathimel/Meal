<?php
function meal_banner_section_metabox( $metaboxes ) {
    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' != get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta( $section_id, 'meal-section-type', true );
    $section_type = $section_meta['type'];
    if ( 'banner' != $section_type ) {
        return $metaboxes;
    }

    $metaboxes[] = [
        'id'        => 'meal-section-banner',
        'title'     => __( 'Banner Setting', 'meal' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => [
            [
                'name' => '',
                'id'     => 'meal-section-banner-one',
                'icon'   => 'fa fa-image',
                'fields' => [
                    [
                        'id'    => 'banner_image',
                        'title' => __( 'Banner image', 'meal' ),
                        'type'  => 'image',
                    ],
                    [
                        'id'    => 'button_title',
                        'title' => __( 'Button Title', 'meal' ),
                        'type'  => 'text',
                    ],
                    [
                        'id'    => 'button_target',
                        'title' => __( 'Button Target', 'meal' ),
                        'type'  => 'text',
                    ],
                ],
            ],

        ],
    ];

    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'meal_banner_section_metabox' );