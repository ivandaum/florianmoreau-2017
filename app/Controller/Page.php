<?php
namespace App\Controller;
use App\Model\Project;
use \App\Service\ProjectFormator;

class Page extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $model = new Project();

        $projects = $model::getAll();
        $projects = ProjectFormator::formatAll($projects);

        self::render('projects',['projects' => $projects]);
    }

    public function single()
    {

        self::render('single');
    }

    public function archive()
    {
        global $wp_query;
        $model = new Project();

        $category = get_category( get_query_var( 'cat' ) );
        $catId = $category->cat_ID;

        $projects = $model::getByCategory($catId);
        $projects = ProjectFormator::formatAll($projects);

        self::render('projects',['projects' => $projects]);
    }

    public function page404()
    {
        self::render('404');
    }
}
