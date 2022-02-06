<?php

class Unit
{
    private $id;
    private $name;
    private $move;
    private $health;
    private $description;
    private $faction;
    private $weapons;
    private $number;
    private $cost;
    private $image;

    public function __construct($id, $name, $move, $health, $faction)
    {
        $this->id = $id;
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

    public function __serialize(): array
    {
        return ['id' => $this->id, 'name' => str_replace(" ","_",$this->name), 'move' => $this->move, 'health' => $this->health, 'faction' => serialize($this->faction), 'description' => str_replace(" ","_",$this->description), 'number' => $this->number, 'cost' => $this->cost];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->name = str_replace("_", " ", $data['name']);
        $this->move = $data['move'];
        $this->health = $data['health'];
        $this->faction = unserialize($data['faction']);
        $this->description = str_replace("_"," ",$data['description']);
        $this->number = $data['number'];
        $this->cost = $data['cost'];
    }

    public function __toString() {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number): void
    {
        $this->number = $number;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost): void
    {
        $this->cost = $cost;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }



}