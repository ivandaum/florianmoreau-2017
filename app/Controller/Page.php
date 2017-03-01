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

        self::render('home',['projects' => $projects]);
    }

    public function single()
    {

        self::render('single');
    }

    public function archive()
    {
        self::render('archive');
    }

    public function page404()
    {
        self::render('404');
    }
}
