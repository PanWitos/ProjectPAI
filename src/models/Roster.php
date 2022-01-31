<?php

class Roster
{
    private $title;
    private $game;

    public function __construct($title, $game)
    {
        $this->title = $title;
        $this->game = $game;
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


}