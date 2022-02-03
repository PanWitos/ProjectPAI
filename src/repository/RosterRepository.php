<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Roster.php';
require_once __DIR__.'/../models/Game.php';
require_once __DIR__.'/../models/User.php';


class RosterRepository extends Repository
{
    public function getRoster(int $id): ?Roster
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM rosters r JOIN games g ON r.games_id = g.id JOIN users u ON r.author_id = u.id JOIN users_details ud on u.id_users_detail = ud.id WHERE r.id = :id');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $roster = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($roster == false)
        {
            return null;
        }

        $game = new Game($roster['game_id'],$roster['game_name']);
        $user = new User($roster['email'], $roster['password'],$roster['user_name'],$roster['user_surname']);
        $user->setId($roster['user_id']);

        $newRoster = new Roster(
            $roster['roster_title'],
            $game,
            $roster['points'],
            1,
            $user
        );

        $newRoster.setId($id);

        return $newRoster;
    }

    public function addRoster(Roster $roster): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO rosters (author_id, roster_title, games_id, points, created_at, factions_id)
        VALUES (?,?,?,?,?,?)
        ');


        $startPoints = 0;
        $factionsId = 1;
        $stmt->execute([
            $roster->getAuthorId(), $roster->getTitle(), $roster->getGame()->getId(), $startPoints, $date->format('Y-m-d'), $factionsId
        ]);
    }


    public function getRosters(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rosters join games on games_id = game_id join users on author_id = user_id join users_details on id_users_detail = ud_id        ');
        $stmt->execute();
        $rosters = $stmt->fetchAll(PDO::FETCH_ASSOC);



        foreach ($rosters as $roster){
            $game = new Game($roster['game_id'], $roster['game_name']);
            $user = new User($roster['email'], $roster['password'], $roster['user_name'], $roster['user_surname']);
            $user->setId($roster['user_id']);
            $result[] = new Roster($roster['roster_title'], $game, $roster['points'], 1, $user);
            end($result)->setId($roster['roster_id']);
        }

        return $result;
    }

    public function getRosterByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM rosters join games on rosters.games_id = games.id WHERE LOWER(title) LIKE :search
        ');
        $stmt->bindParam(":search", $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}