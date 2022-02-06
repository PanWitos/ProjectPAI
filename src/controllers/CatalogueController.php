<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Roster.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Unit.php';
require_once __DIR__.'/../repository/RosterRepository.php';
require_once __DIR__.'/../repository/GameRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/UnitRepository.php';

class CatalogueController extends AppController
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

    public function catalogue()
    {
        $games = $this->gameRepository->getGames();
        $this->render('catalogue', ['messages' => $this->messages, 'games' => $games]);
    }

    public function factionCatalogue() {
        $factions = $this->gameRepository->getFactionsByGame($_GET['id']);
        $this->render("factionCatalogue", ['messages' => $this->messages, 'factions' => $factions]);
    }

    public function unitCatalogue() {

        $units = $this->unitRepository->getUnitsByFaction($this->gameRepository->getFaction($_GET['id']));
        $this->render("unitCatalogue", ['messages' => $this->messages, 'units' => $units]);
    }

    public function item()
    {
        $data = $this->unitRepository->getUnit($_GET['id']);
        $this->render("item", ['messages' => $this->messages, 'unit' => $data]);
    }
}