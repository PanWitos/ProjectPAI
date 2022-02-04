<?php

class Game
{
    private $id;
    private $name;
    private $factions;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __serialize(): array
    {
        return ['id' => $this->id, 'name' => $this->name, 'factions' => serialize($this->factions)];
    }

    public function __unserialize(array $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->factions = unserialize($data['factions']);
    }

    public function __toString() {
        return $this->name;
    }

    public function addFaction($faction)
    {
        $this->factions[$faction->getId()] = $faction;
    }

    public function getFactions()
    {
        return $this->factions;
    }

}