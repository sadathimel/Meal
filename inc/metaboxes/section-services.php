<?php
function meal_services_section_metabox( $metaboxes ) {
    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' != get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta( $section_id, 'meal-section-type', true );
    $section_type = $section_meta['type'];
    if ( 'services' != $section_type ) {
        return $metaboxes;
    }

    $metaboxes[] = [
        'id'        => 'meal-section-services',
        'title'     => __( 'services Setting', 'meal' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => [
            [
                'name' => 'meal-services-section-one',
                'icon'   => 'fa fa-image',
                'fields' => [
                    [
                        'id'    => 'services',
                        'title'   => __( 'services', 'meal' ),
                        'type'    => 'group',
                        'button_title'    => __('Service Image','meal'),
                        'accordion_title' => __('Add Service Image','meal'),
                        'fields' => [

                            [
                                'id'    => 'name',
                                'title' => __( 'Name', 'meal' ),
                                'type'  => 'text',
                            ],
                            
                            [
                                'id'    => 'icon',
                                'title' => __( 'Icon', 'meal' ),
                                'type'  => 'select',
                                'options' => array(
                                    'flaticon-chicken' => __('Chicken','meal'),
                                    'flaticon-pancake' => __('Pancake','meal'),
                                    'flaticon-salad' => __('Salad','meal'),
                                    'flaticon-vegetables' => __('Vegetables','meal'),
                                    'flaticon-soup' => __('Soup','meal'),
                                    'flaticon-tray' => __('Tray','meal'),
                                )
                            ],
                            [
                                'id'    => 'description',
                                'title' => __( 'Description', 'meal' ),
                                'type'  => 'textarea',
                            ],
                            
                        ]
                    ],
                    
                ],
            ],

        ],
    ];

    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'meal_services_section_metabox' );