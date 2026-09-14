<?php

class MusicModel
{
    private $songs = [
        [
            "title" => "Shape of You",
            "artist" => "Ed Sheeran"
        ],
        [
            "title" => "Blinding Lights",
            "artist" => "The Weeknd"
        ],
        [
            "title" => "Believer",
            "artist" => "Imagine Dragons"
        ],
        [
            "title" => "Perfect",
            "artist" => "Ed Sheeran"
        ],
        [
            "title" => "Levitating",
            "artist" => "Dua Lipa"
        ]
    ];

    public function getAllSongs()
    {
        return $this->songs;
    }
}

?>
