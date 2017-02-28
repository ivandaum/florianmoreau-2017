<?php
namespace App\Controller;

class Page extends Controller {
    public function __construct()
    {
        parent::__construct();

        $this->show();
    }

    public function show()
    {
        self::render('home');
    }
}
