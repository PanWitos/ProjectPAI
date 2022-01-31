<?php

require_once 'AppController.php';

class RosterController extends AppController
{
    public function addRoster()
    {
        $this->render("addRoster");
    }
}