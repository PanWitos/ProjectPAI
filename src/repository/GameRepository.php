<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Game.php';


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

        foreach ($games as $game){
            $result[] = new Game($game['game_id'], $game['game_name']);
        }

        return $result;
    }


}