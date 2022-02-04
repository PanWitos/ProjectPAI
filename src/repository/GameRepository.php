<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Faction.php';


class GameRepository extends Repository
{
    public function getGame(int $id): ?Game
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM games WHERE id = :id');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($game == false)
        {
            return null;
        }

        return new Game(
            $game['game_id'],
            $game['game_name']
        );
    }


    public function getGames(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM games
        ');
        $stmt->execute();
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $factions = $this->getFactions();



        foreach ($games as $game){
            $newGame = new Game($game['game_id'], $game['game_name']);
            foreach ($factions as $faction)
            {
                if ($faction->getGameId() == $newGame->getId())
                    {
                        $newGame->addFaction($faction);
                    }
            }
            $result[] = $newGame;
        }
        return $result;
    }

    public function getFactions(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM factions
        ');
        $stmt->execute();
        $factions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($factions as $faction){
            $result[] = new Faction($faction['faction_id'],$faction['faction_name'],$faction['games_id']);
        }

        return $result;
    }

    public function getFactionsByGame($id): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM factions where games_id = :id
        ');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $factions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($factions as $faction){
            $result[] = new Faction($faction['faction_id'],$faction['faction_name'],$faction['games_id']);
        }

        return $result;
    }

}