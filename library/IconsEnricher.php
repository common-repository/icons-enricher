<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricher
{
    const SOURCE_CDN = 'cdn';

    const SOURCE_BUILTIN = 'builtin';

    const SOURCE_DEFAULT = 'default';

    /**
     * @var IconsEnricherMediaButton
     */
    public static $mediaButton;

    /**
     * @var IconsEnricherShortcodes
     */
    public static $shortlinks;

    /**
     * @var IconsEnricherSettings
     */
    public static $settings;

    /**
     * @var IconsEnricherStylesManager
     */
    public static $styles;

    /**
     * @var IconsEnricherMenuIconPicker
     */
    public static $menu;

    /**
     * @var IconsEnricherAjax
     */
    public static $ajax;

    public function __construct()
    {
        // Styles Manager
        require(I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherStylesManager.php');
        self::$styles = new IconsEnricherStylesManager;
        self::$styles->register();

        // AJAX
        require(I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherAjax.php');
        self::$ajax = new IconsEnricherAjax;
        self::$ajax->register();

        // media button
        require( I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherMediaButton.php' );
        self::$mediaButton = new IconsEnricherMediaButton;
        self::$mediaButton->register();

        // shortcodes
        require( I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherShortcodes.php' );
        self::$shortlinks = new IconsEnricherShortcodes;
        self::$shortlinks->register();

        // plugin settings
        require(I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherSettings.php');
        self::$settings = new IconsEnricherSettings;
        self::$settings->register();

        require(I8_ENRICHER_PLUGIN_DIR . 'library/IconsEnricherMenuIconPicker.php');
        self::$menu = new IconsEnricherMenuIconPicker;
        self::$menu->register();
    }
}

