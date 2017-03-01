<?php

require __DIR__ . '/vendor/autoload.php';

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 300, 600, true );
add_image_size( 'image-preview', 500, 9999 );

function debug($array) {
    echo json_encode($array);die;
}

