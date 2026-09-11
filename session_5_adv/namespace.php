<?php

namespace App\Music;

class Playlist
{
    private $songs = [];

    public function addSong($songName)
    {
        $this->songs[] = $songName;
    }

    public function showSongs()
    {
        foreach ($this->songs as $song) {
            echo "Song: " . $song . "<br>";
        }
    }
}

namespace App\Video;

class Playlist
{
    private $videos = [];

    public function addVideo($videoName)
    {
        $this->videos[] = $videoName;
    }

    public function showVideos()
    {
        foreach ($this->videos as $video) {
            echo "Video: " . $video . "<br>";
        }
    }
}

namespace App;

use App\Music\Playlist as MusicPlaylist;
use App\Video\Playlist as VideoPlaylist;

$musicPlaylist = new MusicPlaylist();

$musicPlaylist->addSong("Shape of You");
$musicPlaylist->addSong("Perfect");

echo "Music Playlist:<br>";
$musicPlaylist->showSongs();

echo "<br>";

$videoPlaylist = new VideoPlaylist();

$videoPlaylist->addVideo("PHP Tutorial");
$videoPlaylist->addVideo("Laravel Tutorial");

echo "Video Playlist:<br>";
$videoPlaylist->showVideos();

?>
