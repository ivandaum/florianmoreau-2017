<?php
global $wp;

define('URL',home_url(add_query_arg(array(),$wp->request)));
define('VIEW','public/views/');