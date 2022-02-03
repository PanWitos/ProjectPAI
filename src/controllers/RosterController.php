<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Roster.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../repository/RosterRepository.php';
require_once __DIR__.'/../repository/GameRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class RosterController extends AppController
{

    private $messages = [];
    private $rosterRepository;
    private $gameRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rosterRepository = new RosterRepository();
        $this->gameRepository = new GameRepository();
        $this->userRepository = new UserRepository();
    }

    public function rosters()
    {
        $rosters = $this->rosterRepository->getRosters();
        $this->render('rosters', ['rosters' => $rosters]);
    }

    public function addRoster()
    {
        if($this->isPost())
        {
            session_start();
            $authorId = $_SESSION['userid'];
            $user = $this->userRepository->getUserById($authorId);
            $roster = new Roster($_POST['title'], unserialize($_POST['game']), 0, 1, $user);
            $this->rosterRepository->addRoster($roster);

            return $this->render('rosters', ['rosters' => $this->rosterRepository->getRosters(), 'messages' => $this->messages]);
        }
        $this->render("addRoster", ['messages' => $this->messages, 'games' => $this->gameRepository->getGames()]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->rosterRepository->getRosterByTitle($decoded['search']));
        }
    }

    public function roster()
    {
        $roster = $this->rosterRepository->getRoster($_GET['id']);
        $this->render("roster", ['messages' => $this->messages, 'roster' => $roster]);
    }
}