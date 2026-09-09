<?php

abstract class SocialMediaPost
{
    abstract public function share(): void;
}

class InstagramPost extends SocialMediaPost
{
    public function share(): void
    {
        echo "Sharing post on Instagram.<br>";
    }
}

class TwitterPost extends SocialMediaPost
{
    public function share(): void
    {
        echo "Sharing post on Twitter.<br>";
    }
}

// Testing
$instagram = new InstagramPost();
$twitter = new TwitterPost();

$instagram->share();
$twitter->share();
