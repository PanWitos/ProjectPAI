<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Roster.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Unit.php';
require_once __DIR__.'/../repository/RosterRepository.php';
require_once __DIR__.'/../repository/GameRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/UnitRepository.php';

class RosterController extends AppController
{

    private $messages = [];
    private $rosterRepository;
    private $gameRepository;
    private $userRepository;
    private $unitRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rosterRepository = new RosterRepository();
        $this->gameRepository = new GameRepository();
        $this->userRepository = new UserRepository();
        $this->unitRepository = new UnitRepository();
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
            $game = unserialize($_POST['game']);
            $factions = $game->getFactions();

            if (!in_array(unserialize($_POST['faction']), $factions))
            {
                return $this->render("addRoster", ['messages' => ['Faction doesn\'t match the game'], 'games' => $this->gameRepository->getGames()]);
            }
            $roster = new Roster($_POST['title'], unserialize($_POST['game']), 0, unserialize($_POST['faction']), $user);
            $this->rosterRepository->addRoster($roster);
            return $this->render('rosters', ['rosters' => $this->rosterRepository->getRosters(), 'messages' => $this->messages]);
        }
        $this->render("addRoster", ['messages' => $this->messages, 'games' => $this->gameRepository->getGames()]);
    }

    public function addUnit()
    {

        if($this->isPost())
        {
            $roster = $this->rosterRepository->getRoster($_GET['id']);
            $unit = unserialize($_POST['unit']);
            $this->unitRepository->addUnit($unit, $roster->getId(), $_POST['number']);
            return $this->render("addUnit", ['messages' => ['Unit added to roster'], 'units' => $this->unitRepository->getUnitsByFaction($roster->getFaction())]);
        }
        $roster = $this->rosterRepository->getRoster($_GET['id']);
        $this->render("addUnit", ['messages' => $this->messages, 'units' => $this->unitRepository->getUnitsByFaction($roster->getFaction()), 'id' => $roster->getId()]);
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
        if (is_null($_GET['id'] ) )
        {
            $this->render('rosters', ['messages' => $this->messages]);
        }
        $roster = $this->rosterRepository->getRoster($_GET['id']);
        $this->render("roster", ['messages' => $this->messages, 'roster' => $roster, 'units' => $this->unitRepository->getUnitsByRoster($roster->getId())]);
    }
}