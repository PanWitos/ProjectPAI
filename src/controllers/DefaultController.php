<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('login');
    }

    public function rosters()
    {
        $this->render('rosters');
    }

    public function catalogue()
    {
        $this->render('catalogue');
    }

    public function item()
    {
        $this->render('item');
    }

    public function profile()
    {
        $this->render('profile');
    }
}