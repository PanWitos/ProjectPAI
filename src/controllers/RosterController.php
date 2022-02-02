<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Roster.php';
require_once __DIR__.'/../repository/RosterRepository.php';

class RosterController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];

    private $messages = [];
    private $rosterRepository;

    public function __construct()
    {
        parent::__construct();
        $this->rosterRepository = new RosterRepository();
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
            $roster = new Roster($_POST['title'], $_POST['game'], 0);
            $this->rosterRepository->addRoster($roster);

            return $this->render('rosters', ['rosters' => $this->rosterRepository->getRosters(), 'messages' => $this->messages]);
        }
        $this->render("addRoster", ['messages' => $this->messages]);
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
}