<?php

class InstaStory
{
    public $title;
    public $duration;

    public function __construct($title, $duration)
    {
        $this->title = $title;
        $this->duration = $duration;
    }

    public function displayStory()
    {
        echo "Story Title: " . $this->title . "<br>";
        echo "Duration: " . $this->duration . " seconds<br>";
    }

    public function __destruct()
    {
        echo "Story " . $this->title . " expired";
    }
}

$story = new InstaStory("Weekend Trip", 15);

$story->displayStory();

?>
