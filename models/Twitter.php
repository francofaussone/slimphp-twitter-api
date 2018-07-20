<?php 
require_once('../src/lib/TwitterAPIExchange.php');

class TwitterClass { 

    private $settings = array(
        'oauth_access_token' => "1019562300074856448-sMbWqyD68UnRAm0hesc8FHQZnuwHUN",
        'oauth_access_token_secret' => "EZwUW6mYpeMtpuJZ7veV8qN7HE6KDd8GVMYoTKfzNC1T0",
        'consumer_key' => "RLDO0DRcG4qqNHhk9Dqa7ABmY",
        'consumer_secret' => "own3KOPgX4eqRbjJfpWu6Okh9S0iC8ncAmi5ZhDWuuVCuqvXqL"
    );

    /**
     * Get the value of settings
     */ 
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set the value of settings
     *
     * @return  self
     */ 
    
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }
}    