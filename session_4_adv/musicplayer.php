<?php

class MusicPlayer
{
    public function play(): void
    {
        echo "Playing music...<br>";
    }
}

class SpotifyPlayer extends MusicPlayer
{
    public function play(): void
    {
        echo "Playing music using Spotify.<br>";
    }
}

class YouTubeMusicPlayer extends MusicPlayer
{
    public function play(): void
    {
        echo "Playing music using YouTube Music.<br>";
    }
}

// Testing
$spotify = new SpotifyPlayer();
$youtube = new YouTubeMusicPlayer();

$spotify->play();
$youtube->play();
