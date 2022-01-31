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
}