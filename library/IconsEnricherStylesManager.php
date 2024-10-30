<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherStylesManager
{
    /**
     * @var array
     */
    protected $styles = array();

    /**
     * Регистрация хуков
     * @return void
     */
    public function register()
    {
        global $pagenow;

        if (!is_admin()) {
            add_action('get_footer', array(&$this, '_enqueue_front_scripts'), 999, 0);
        } else if (in_array($pagenow, array('post.php', 'page.php', 'post-new.php', 'post-edit.php', 'nav-menus.php'))) {
            add_action('admin_footer', array(&$this, '_add_icon_dialog'));
            add_action('admin_print_scripts', array(&$this, '_enqueue_admin_scripts'));
        }
    }

    /**
     * Добовление стилей
     * @param string $package
     * @param string $css_url
     * @return void
     */
    public function add($package, $css_url)
    {
        if ($package && $css_url) {
            $this->styles[$package] = $css_url;
        }
    }

    /**
     * Получение всех стилей
     * @return array
     */
    public function get()
    {
        return array_unique($this->styles);
    }

    /**
     * Регистрация стилей иконок
     * @return void
     */
    public function _enqueue_front_scripts()
    {
        foreach($this->get() as $package => $css_url) {
            wp_register_style(I8_ENRICHER . '-' . $package, $css_url);
            wp_enqueue_style(I8_ENRICHER . '-' . $package);
        }
    }

    /**
     * Get plugins option value
     * @param $option
     * @return mixed|void
     */
    protected function option($option)
    {
        return IconsEnricher::$settings->option($option);
    }

    /**
     * @return void
     */
    public function _add_icon_dialog()
    {
        $packs = array();
        foreach (IconsEnricher::$settings->packs as $i => $pack) {
            $packs[$pack->apiCode] = (array)$pack;
            $packs[$pack->apiCode]['enabled'] = (int)$this->option('i8e__pack_' . $pack->apiCode . '_enabled');
        }

        // meta data for icons search
        $meta = array();

        if ((int)$this->option('i8e__pack_lineawesome_enabled') || (int)$this->option('i8e__pack_fontawesome_enabled'))
            $meta['lineawesome'] = plugins_url('/assets/meta/line-awesome.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));
        if ((int)$this->option('i8e__pack_ionicons_enabled'))
            $meta['ionicons'] = plugins_url('assets/meta/ionicons.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));
        if ((int)$this->option('i8e__pack_simplelineicons_enabled'))
            $meta['simplelineicons'] = plugins_url('assets/meta/simple-line-icons.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));
        if ((int)$this->option('i8e__pack_typicons_enabled'))
            $meta['typicons'] = plugins_url('assets/meta/typicons.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));
        if ((int)$this->option('i8e__pack_weathericons_enabled'))
            $meta['weathericons'] = plugins_url('assets/meta/weather-icons.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));
        if ((int)$this->option('i8e__pack_foundationicons_enabled'))
            $meta['foundationicons'] = plugins_url('assets/meta/foundation-icons.min.json?v=' . I8_ENRICHER_VERSION, dirname(__FILE__));

        ?>
        <script type="text/javascript">/* <![CDATA[ */
            iconsEnricherSettings = {
                settingsUrl: <?php echo current_user_can('manage_options') ? '"' . esc_url(IconsEnricher::$settings->settings_url()) . '"' : 'false' ?>,
                packs: <?php echo wp_json_encode($packs) ?>,
                meta: <?php echo wp_json_encode($meta) ?>
            };
            /* ]]> */</script>
            <div id="icons-enricher-wrap"></div>
        <?php
    }

    /**
     * @return void
     */
    public function _enqueue_admin_scripts()
    {
        //color picker scripts
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');

        wp_enqueue_script(I8_ENRICHER . '-icon-picker-js', plugins_url('assets/dist/js/main.js', dirname(__FILE__)), array('jquery', 'wp-color-picker'));
        wp_enqueue_style(I8_ENRICHER . '-icon-picker-css', plugins_url('assets/dist/css/main.css', dirname(__FILE__)));

        foreach(IconsEnricher::$settings->packs as $pack)
        {
            if ($this->option('i8e__pack_' . $pack->apiCode . '_enabled'))
            {
                $source = $this->option('i8e__pack_' . $pack->apiCode . '_source');
                $css_url = false;
                if (IconsEnricher::SOURCE_BUILTIN == $source && !empty($pack->source_builtin))
                    $css_url = plugins_url($pack->source_builtin, dirname(__FILE__) );
                elseif (IconsEnricher::SOURCE_CDN == $source && !empty($pack->source_cdn))
                    $css_url = $pack->source_cdn;

                if ($css_url)
                {
                    wp_register_style(I8_ENRICHER . '-' . $pack->apiCode, $css_url);
                    wp_enqueue_style(I8_ENRICHER . '-' . $pack->apiCode);
                }
            }
        }
    }
}

