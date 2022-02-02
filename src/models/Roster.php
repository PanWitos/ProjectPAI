<?php

class Roster
{
    private $title;
    private $game;
    private $points;
    private $faction;
    private $author;
    private $id;

    public function __construct($title, $game, $points, $faction)
    {
        $this->title = $title;
        $this->game = $game;
        $this->points = $points;
        $this->faction = $faction;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getGame()
    {
        return $this->game;
    }

    public function setGame($game): void
    {
        $this->game = $game;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setPoints($points): void
    {
        $this->points = $points;
    }

    public function getFaction()
    {
        return $this->faction;
    }

    public function setFaction($faction): void
    {
        $this->faction = $faction;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


}