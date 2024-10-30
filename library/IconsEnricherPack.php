<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherPack
{
    public $apiCode = "";
    public $pixelPerfectSize = "";
    public $title = "";
    public $version = "";
    public $class = "";
    public $prefix = "";
    public $credits = "";
    public $url = "";
    public $description = "";
    public $license = "";
    public $hasNew = false;
    public $colorable = false;
    public $font = false;
    public $source_builtin = false;
    public $source_cdn = false;

    public function __construct($options)
    {
        foreach($options as $option => $value)
            $this->{$option} = $value;
    }
}