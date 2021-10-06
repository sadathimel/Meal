<?php

function meal_featured_category( $metaboxes ) {
    $metaboxes[] = [
        'id'       => '',
        'taxonomy' => 'category',
        'fields'   => [
            [
                'id'    => 'featured',
                'type'  => 'switcher',
                'title' => __( 'Featured', 'meal' ),
            ],
        ],
    ];
    return $metaboxes;
}
add_filter( 'cs_taxonomy_options', 'meal_featured_category' );