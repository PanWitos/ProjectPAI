<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Roster.php';


class RosterRepository extends Repository
{
    public function getRoster(int $id): ?Roster
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM rosters WHERE id = :id');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();

        $roster = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($roster == false)
        {
            return null;
        }

        return new Roster(
            $roster['title'],
            $roster['game'],
            $roster['points']
        );
    }

    public function addRoster(Roster $roster): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
        INSERT INTO rosters (author_id, title, game, points, created_at)
        VALUES (?,?,?,?,?)
        ');

        $authorId = 1;
        $startPoints = 0;
        $stmt->execute([
            $authorId, $roster->getTitle(), $roster->getGame(), $startPoints, $date->format('Y-m-d')
        ]);
    }

    public function getRosters(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rosters
        ');
        $stmt->execute();
        $rosters = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rosters as $roster){
            $result[] = new Roster($roster['title'], $roster['game'], $roster['points']);
        }

        return $result;
    }
}