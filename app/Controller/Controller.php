<?php
namespace App\Controller;

class Controller {

    protected $entity;
    protected $wp_query;
    protected $wp;

    public function __construct() {
        global $post,$wp,$wp_query;
        $this->post = $post;
        $this->wp = $wp;
        $this->wp_query = $wp_query;
    }

    static public function render($view,$args = null)
    {
        if($args) extract($args);

        get_template_part(VIEW_PATH.'partials/head');
        get_template_part(VIEW_PATH.$view);
        get_template_part(VIEW_PATH.'partials/footer');
    }
}
