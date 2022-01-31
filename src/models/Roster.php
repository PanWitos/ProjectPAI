<?php

class Roster
{
    private $title;
    private $game;
    private $points;

    public function __construct($title, $game, $points)
    {
        $this->title = $title;
        $this->game = $game;
        $this->points = $points;
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


}