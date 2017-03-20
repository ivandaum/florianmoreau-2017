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

        self::render('projects',[
            'projects' => $projects,
            'title' => explodeTitle('Florian Moreau')
        ]);
    }

    public function single()
    {
        $id = $this->post->ID;
        $model = new Project();
        $project = $model::findById($id);
        $project = ProjectFormator::formatOne($project[0]);
        $category = get_category_by_slug($project['category']);
        self::render('single',[
            'project' => $project,
            'category' => $category
        ]);
    }

    public function archive()
    {
        $model = new Project();

        $category = get_category( get_query_var( 'cat' ) );

        $projects = $model::getByCategory($category->cat_ID);
        $projects = ProjectFormator::formatAll($projects);

        self::render('projects',[
            'projects' => $projects,
            'title' => explodeTitle($category->name)
        ]);
    }

    public function page()
    {
        self::render('404');
    }

    public function page404()
    {
        self::render('404');
    }
}
