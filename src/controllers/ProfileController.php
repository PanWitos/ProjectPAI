<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Unit.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/GameRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{

    private $messages = [];
    private $userRepository;
    private $unitRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->unitRepository = new UnitRepository();
    }

    public function profile()
    {
        session_start();
        if (!isset($_SESSION['userid']))
        {
            header("location: ../login");
        }
        $user = $this->userRepository->getUserById($_SESSION['userid']);
        $this->render('profile', ['messages' => $this->messages, 'user' => $user]);
    }

}