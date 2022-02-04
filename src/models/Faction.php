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

    public function __serialize(): array
    {
        return ['id' => $this->id, 'name' => $this->name, 'game_id' => $this->game_id];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->game_id = $data['game_id'];
    }

    public function __toString() {
        return $this->name;
    }


}