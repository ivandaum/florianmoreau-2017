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

    static public function render($view,$args = [])
    {

        $args['categories'] = get_categories();

        if($args) extract($args);

        require(TEMPLATES_PATH.'partials/head.php');
        require(TEMPLATES_PATH.$view.'.php');
        require(TEMPLATES_PATH.'partials/footer.php');
    }
}
