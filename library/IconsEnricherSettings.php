<?php
defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherSettings
{
    /**
     * @var IconsEnricherPack[]
     */
    public $packs;

    public function register()
    {
        require (I8_ENRICHER_PLUGIN_DIR . '/library/IconsEnricherPack.php');
        $this->packs = array(
            new IconsEnricherPack(array(
                "apiCode" => "lineawesome",
                "pixelPerfectSize" => 32,
                "title" => "Line Awesome",
                "version" => "1.1",
                "prefix" => "la la-",
                "class" => "la la-{code}",
                "credits" => "",
                "url" => "https://icons8.com/line-awesome".I8_ENRICHER_GA_TRACKING,
                "description" => "",
                "license" => "",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/line-awesome/css/line-awesome.min.css",
                "source_cdn" => "https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "fontawesome",
                "pixelPerfectSize" => 28,
                "title" => "Font Awesome",
                "version" => "4.4.0",
                "prefix" => "fa fa-",
                "class" => "fa fa-{code}",
                "credits" => "",
                "url" => "https://icons8.com/line-awesome".I8_ENRICHER_GA_TRACKING,
                "description" => "",
                "license" => "",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/font-awesome/css/font-awesome.min.css",
                "source_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "ionicons",
                "pixelPerfectSize" => 32,
                "prefix" => "ion-",
                "class" => "ion-{code}",
                "title" => "Ion Icons",
                "version" => "2.0.1",
                "credits" => "",
                "url" => "http://ionicons.com/",
                "description" => "",
                "license" => "",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/ionicons/css/ionicons.min.css",
                "source_cdn" => "http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "simplelineicons",
                "pixelPerfectSize" => 24,
                "prefix" => "icon-",
                "class" => "icon-{code}",
                "title" => "Simple Line Icons",
                "version" => "2.4.1",
                "credits" => "<a href=\"https://twitter.com/byjml\">Jamal Jama</a> for creating this awesome webfont &amp; <a href=\"https://twitter.com/firoz_usf\">Ahmad Firoz</a> for extending it further.",
                "url" => "http://simplelineicons.com/",
                "description" => "",
                "license" => "MIT License",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/simple-line-icons/css/simple-line-icons.min.css",
                "source_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "weathericons",
                "pixelPerfectSize" => 24,
                "prefix" => "wi wi-",
                "class" => "wi wi-{code}",
                "title" => "Weather Icons",
                "version" => "2.0.10",
                "credits" => "<a href=\"https://github.com/erikflowers\">Erik Flowers</a>",
                "url" => "http://erikflowers.github.io/weather-icons/",
                "description" => "Weather Icons is the only icon font and CSS with 222 weather themed icons, ready to be dropped right into Bootstrap, or any project that needs high quality weather, maritime, and meteorological based icons!",
                "license" => "Code licensed under <a href=\"http://opensource.org/licenses/mit-license.html\">MIT License</a>; Weather Icons licensed under <a href=\"http://scripts.sil.org/OFL\">SIL OFL 1.1</a>",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/weather-icons/css/weather-icons.min.css",
                "source_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.10/css/weather-icons.min.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "typicons",
                "pixelPerfectSize" => 36,
                "prefix" => "typcn typcn-",
                "class" => "typcn typcn-{code}",
                "title" => "Typicons",
                "version" => "2.0.8",
                "credits" => "<a href=\"https://github.com/stephenhutchings\">Stephen Hutchings</a>",
                "url" => "http://www.typicons.com/",
                "description" => "",
                "license" => "Font distributed under <a href=\"http://scripts.sil.org/cms/scripts/page.php?item_id=OFL_web\">SIL Open Font Licence</a> licence",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/typicons/typicons.min.css",
                "source_cdn" => "https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.8/typicons.min.css",
            )),
            new IconsEnricherPack(array(
                "apiCode" => "foundationicons",
                "pixelPerfectSize" => 36,
                "prefix" => "fi-",
                "class" => "fi-{code}",
                "title" => "Foundation Icons",
                "version" => "3.0",
                "credits" => "<a href=\"http://zurb.com/playground/foundation-icon-fonts-3\">ZURB 2013</a>",
                "url" => "http://zurb.com/playground/foundation-icon-fonts-3",
                "description" => "",
                "license" => "Font distributed under <a href=\"http://opensource.org/licenses/mit-license.html\">MIT License</a> licence",
                "colorable" => "true",
                "font" => "true",
                "source_builtin" => "assets/fonts/foundation-icons/foundation-icons.min.css",
                "source_cdn" => "https://cdn.jsdelivr.net/foundation-icons/3.0/foundation-icons.min.css",
            )),
        );

        if (!current_user_can('manage_options'))
            return;

        // link to settings from plugins list
        $plugin = plugin_basename(I8_ENRICHER_PLUGIN_FILE);
        add_filter("plugin_action_links_$plugin",  array(&$this, 'settings_link'));

        // settings page
        add_action('admin_menu', array(&$this, 'register_settings_page'));

        // save settings
        add_action('admin_init', array(&$this, 'save_settings') );
    }

    /**
     * Add action link to plugins page from plugins listing.
     */
    function settings_link($links) {
        $settings_link = '<a href="' . esc_url($this->settings_url()) . '">' . __('Settings', I8_ENRICHER) . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }

    /**
     * Return URL to plugins settings page
     * @return string
     */
    function settings_url() {
        return add_query_arg(array('page' => I8_ENRICHER,), admin_url('options-general.php'));
    }

    /**
     * Add link to plugins settings page to admin menu
     */
    function register_settings_page() {
        add_options_page(
            $page_title = I8_ENRICHER_NAME,
            $menu_title = I8_ENRICHER_NAME,
            $capability = 'administrator',
            $menu_slug = I8_ENRICHER,
            $function = array(&$this, 'show_settings_page')
        );
    }

    /**
     * Save plugins settings
     */
    function save_settings()
    {
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce($_POST['_wpnonce'], I8_ENRICHER."-options"))
            return false;

        foreach($this->packs as $pack)
        {
            $enabledOption = 'i8e__pack_'.$pack->apiCode.'_enabled';
            if (isset($_POST[$enabledOption]))
                update_option($enabledOption, $this->sanitize_enabled($_POST[$enabledOption]));

            $sourceOption = 'i8e__pack_'.$pack->apiCode.'_source';
            if ($pack->apiCode == 'fontawesome')
            {
                if (isset($_POST[$sourceOption]))
                    update_option($sourceOption, $this->sanitize_source($_POST[$sourceOption], array(IconsEnricher::SOURCE_BUILTIN, IconsEnricher::SOURCE_CDN, IconsEnricher::SOURCE_DEFAULT), IconsEnricher::SOURCE_BUILTIN));
            } elseif (!empty($pack->source_cdn))
            {
                if (isset($_POST[$sourceOption]))
                    update_option($sourceOption, $this->sanitize_source($_POST[$sourceOption], array(IconsEnricher::SOURCE_BUILTIN, IconsEnricher::SOURCE_CDN), IconsEnricher::SOURCE_BUILTIN));
            }
        }
    }

    /**
     * Show plugins settings page
     */
    function show_settings_page()
    {
        include I8_ENRICHER_PLUGIN_DIR . '/pages/settings_page.php';
    }

    /**
     * Get plugins option value
     * @param $option
     * @return mixed|void
     */
    public function option($option)
    {
        $default = '';
        if ('_enabled' == substr($option, -8))
            $default = '1';
        if ('_source' == substr($option, -7))
            $default = IconsEnricher::SOURCE_BUILTIN;

        return get_option($option, $default);
    }

    /**
     * Filter for '_enabled' options
     * @param $enabled
     * @return string
     */
    protected function sanitize_enabled($enabled)
    {
        return (int)$enabled ? '1' : '0';
    }

    /**
     * Filter for '_source' options
     * @param $source
     * @param $sources
     * @param $default
     * @return mixed
     */
    protected function sanitize_source($source, $sources, $default)
    {
        return in_array($source, $sources) ? $source : $default;
    }
}