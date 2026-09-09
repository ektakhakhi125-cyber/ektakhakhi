<?php

class Playlist
{
    public $name;
    public $creator;

    public function __construct($name, $creator)
    {
        $this->name = $name;
        $this->creator = $creator;
    }

    public function displayPlaylist()
    {
        echo "Playlist: " . $this->name . "<br>";
        echo "Created by: " . $this->creator;
    }
}

$playlist = new Playlist("My Favorites", "Rahul");

$playlist->displayPlaylist();

?>
