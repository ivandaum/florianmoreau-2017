<?php
namespace App\Controller;

class Page extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {

        self::render('home',['test' => 'yolo']);
    }

    public function single()
    {

        self::render('home',['test' => 'yolo']);
    }

    public function archive()
    {
        self::render('home',['test' => 'yolo']);
    }

    public function page404()
    {
        self::render('404',['test' => 'yolo']);
    }
}
