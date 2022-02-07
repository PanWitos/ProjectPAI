<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Unit.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../repository/GameRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/UnitRepository.php';

class ProfileController extends AppController
{

    private $messages = [];
    private $userRepository;
    private $unitRepository;
    private $gameRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->unitRepository = new UnitRepository();
        $this->gameRepository = new GameRepository();
    }

    public function profile()
    {
        session_start();
        if (!isset($_SESSION['userid']))
        {
            header("location: ../login");
        }
        $user = $this->userRepository->getUserById($_SESSION['userid']);
        $favGames = $this->userRepository->getFavouriteGames($_SESSION['userid']);
        $this->render('profile', ['messages' => $this->messages, 'user' => $user, 'games' => $favGames]);
    }

    public function favourites()
    {
        if($this->isPost())
        {
            session_start();
            if (!isset($_SESSION['userid']))
            {
                $this->render('login');
            }
            $game = unserialize($_POST['fave']);
            $this->userRepository->addFavourite($game->getId(), $_SESSION['userid']);
            $user = $this->userRepository->getUserById($_SESSION['userid']);
            $favGames = $this->userRepository->getFavouriteGames($_SESSION['userid']);
            return $this->render('profile', ['messages' => $this->messages, 'user' => $user, 'games' => $favGames]);
        }
        session_start();
        if (!isset($_SESSION['userid']))
        {
            $this->render('login');
        }
        $favs = $this->gameRepository->getNotFavourite($_SESSION['userid']);
        $this->render('favourites', ['messages' => $this->messages, 'games' => $favs]);
    }

}