<?php
global $wp;

define('URL',home_url(add_query_arg(array(),$wp->request)));
define('VIEW_PATH','public/views/');
define('PUBLIC_PATH','wp-content/themes/' . wp_get_theme()->template . '/public/');