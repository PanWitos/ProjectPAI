<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/Faction.php';


class GameRepository extends Repository
{
    public function getGame(int $id): ?Game
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM games WHERE game_id = :id');
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

    public function getFaction(int $id): ?Faction
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM factions WHERE faction_id = :id');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $faction = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($faction == false)
        {
            return null;
        }

        return new Faction($faction['faction_id'], $faction['faction_name'], $faction['games_id']);
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

    public function getNotFavourite($id) {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            select * from games where game_name not in (select game_name from favourite_games join users on user_id = users_id join games on games_id = game_id where user_id = :id)
        ');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($games as $game){

            $result[] = new Game($game['game_id'], $game['game_name']);
        }
        return $result;
    }

}