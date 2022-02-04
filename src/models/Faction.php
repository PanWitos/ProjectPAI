<?php

class Faction
{
    private $id;
    private $name;
    private $game_id;

    public function __construct($id, $name, $game_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->game_id = $game_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getGameId()
    {
        return $this->game_id;
    }

    public function setGameId($game_id): void
    {
        $this->game_id = $game_id;
    }


}