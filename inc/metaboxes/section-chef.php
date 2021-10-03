<?php
function meal_chef_section_metabox( $metaboxes ) {
    $section_id = 0;
    if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
        $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
    }

    if('section' != get_post_type($section_id)){
        return $metaboxes;
    }

    $section_meta = get_post_meta( $section_id, 'meal-section-type', true );
    $section_type = $section_meta['type'];
    if ( 'chef' != $section_type ) {
        return $metaboxes;
    }

    $metaboxes[] = [
        'id'        => 'meal-section-chef',
        'title'     => __( 'Chef Setting', 'meal' ),
        'post_type' => 'section',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => [
            [
                'name' => 'meal-Chef-section-one',
                'icon'   => 'fa fa-image',
                'fields' => [
                    [
                        'id'    => 'chef',
                        'title'   => __( 'Chefs', 'meal' ),
                        'type'    => 'group',
                        'button_title'    => __('Chef Image','meal'),
                        'accordion_title' => __('Add Chef Image','meal'),
                        'fields' => [

                            [
                                'id'    => 'name',
                                'title' => __( 'Name', 'meal' ),
                                'type'  => 'text',
                            ],
                            
                            [
                                'id'    => 'image',
                                'title' => __( 'chef image', 'meal' ),
                                'type'  => 'image',
                            ],
                            
                            [
                                'id'    => 'title',
                                'title' => __( 'Title', 'meal' ),
                                'type'  => 'text',
                            ],
                            [
                                'id'    => 'bio',
                                'title' => __( 'Bio', 'meal' ),
                                'type'  => 'textarea',
                            ],
                            [
                                'id'    => 'social_profiles',
                                'title' => __( 'Social Profiles', 'meal' ),
                                'type'  => 'fieldset',
                                'fields' =>[
                                    [
                                        'id'    => 'facebook',
                                        'title' => __( 'Facebook', 'meal' ),
                                        'type'  => 'text',
                                    ],
                                    [
                                        'id'    => 'twitter',
                                        'title' => __( 'Twitter', 'meal' ),
                                        'type'  => 'text',
                                    ],
                                    [
                                        'id'    => 'instagram',
                                        'title' => __( 'Instagram', 'meal' ),
                                        'type'  => 'text',
                                    ],
                                ]
                            ],
                            
                        ]
                    ],
                    
                ],
            ],

        ],
    ];

    return $metaboxes;
}
add_filter( 'cs_metabox_options', 'meal_chef_section_metabox' );