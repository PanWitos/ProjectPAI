<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Unit.php';
require_once __DIR__.'/../models/Faction.php';


class UnitRepository extends Repository
{
    public function getUnitsByFaction($faction) :array
    {
        $result = [];
        $factionId = $faction->getId();
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM units where factions_id = :id
        ');
        $stmt->bindParam(':id',$factionId, PDO::PARAM_INT);
        $stmt->execute();
        $units = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($units as $unit){
            $newUnit = new Unit($unit['unit_id'], $unit['unit_name'], $unit['unit_move'], $unit['unit_health'], $faction);
            $newUnit->setDescription($unit['description']);
            $result[] = $newUnit;
        }

        return $result;
    }

    public function getUnitsByRoster($id) :array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * from units join units_in_roster on unit_id = units_id join factions on faction_id = factions_id where rosters_id = :id
        ');
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);
        $stmt->execute();
        $units = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($units as $unit){
            $faction = new Faction($unit['faction_id'], $unit['faction_name'], $unit['games_id']);
            $newUnit = new Unit($unit['unit_id'], $unit['unit_name'], $unit['unit_move'], $unit['unit_health'], $faction);
            $newUnit->setDescription($unit['description']);
            $result[] = $newUnit;
        }

        return $result;
    }

    public function addUnit($unit, $id, $number) :void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO units_in_roster (rosters_id, units_id, number)
        VALUES (?,?,?)
        ');

        $stmt->execute([
            $id, $unit->getId(), $number
        ]);
    }
}