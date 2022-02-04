<?php

class Unit
{
    private $name;
    private $move;
    private $health;
    private $description;
    private $faction;
    private $weapons;

    public function __construct($name, $move, $health, $faction)
    {
        $this->name = $name;
        $this->move = $move;
        $this->health = $health;
        $this->faction = $faction;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getMove()
    {
        return $this->move;
    }

    public function setMove($move): void
    {
        $this->move = $move;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function setHealth($health): void
    {
        $this->health = $health;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getFaction()
    {
        return $this->faction;
    }

    public function setFaction($faction): void
    {
        $this->faction = $faction;
    }

    public function getWeapons()
    {
        return $this->weapons;
    }

    public function setWeapons($weapons): void
    {
        $this->weapons = $weapons;
    }


}