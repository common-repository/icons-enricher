<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherShortcodes
{
    /**
     * @var IconsEnricherPack[]
     */
    protected $packs_by_prefix = null;

    public function register()
    {
        add_shortcode('ie:icon', array(&$this, 'icon_shortcode'));
    }

    protected function option($option)
    {
        return IconsEnricher::$settings->option($option);
    }

    /**
     * Shortcode to render the icon
     * [ie:icon icon="la la-balance-scale" size="14px" color="#dd3333" align="left" offset-top="20px" offset-left="15px" offset-bottom="10px" offset-right="15px"]
     */
    function icon_shortcode($atts)
    {
        $attributes = shortcode_atts(array(
            'icon' => null,
            'class' => $this->option('icon-class'),
            'align' => null,
            'size' => null,
            'color' => null,
            'offset-left' => null,
            'offset-right' => null,
            'offset-top' => null,
            'offset-bottom' => null,
        ), $atts);

        $classes = array();
        $styles = array();
        $tag = 'img';
        $closingTag = '';

        list($prefix, $iconCode) = explode('-', $attributes['icon'], 2);
        if ($pack = $this->findPackByPrefix($prefix))
        {
            $this->require_media($pack);

            $classes[] = str_replace('{code}', $iconCode, $pack->class);
            if ($pack->font)
            {
                $tag = 'i';
                $closingTag = '</i>';

                if (!empty($attributes['size']))
                {
                    $styles[] = 'font-size:' . $attributes['size'];
                }
            }
            if ($pack->colorable)
            {
                if (!empty($attributes['color']))
                {
                    $styles[] = 'color:' . $attributes['color'];
                }
            }
        }

        if (!empty($attributes['align']))
        {
            if ('left' == $attributes['align'] || 'right' == $attributes['align'])
                $styles[] = 'float:' . $attributes['align'];
        }

        if (!empty($attributes['offset-top']))
            $styles[] = 'padding-top:' . $attributes['offset-top'];
        if (!empty($attributes['offset-left']))
            $styles[] = 'padding-left:' . $attributes['offset-left'];
        if (!empty($attributes['offset-bottom']))
            $styles[] = 'padding-bottom:' . $attributes['offset-bottom'];
        if (!empty($attributes['offset-right']))
            $styles[] = 'padding-right:' . $attributes['offset-right'];

        $classes = implode(' ', $classes);
        $styles = implode(';', $styles);
        if (''!==$styles)
            $styles = ' style="'.$styles.'"';

        $icon_html = "<{$tag} class=\"{$classes}\"{$styles}>{$closingTag}";

        return $icon_html;
    }

    protected function require_media($pack)
    {
        if ($this->option('i8e__pack_' . $pack->apiCode . '_enabled'))
        {
            $source = $this->option('i8e__pack_' . $pack->apiCode . '_source');
            $css_url = false;
            if (IconsEnricher::SOURCE_BUILTIN === $source && !empty($pack->source_builtin)) {
                $css_url = plugins_url($pack->source_builtin, dirname(__FILE__));
            } else if (IconsEnricher::SOURCE_CDN === $source && !empty($pack->source_cdn)) {
                $css_url = $pack->source_cdn;
            }

            if ($css_url) {
                IconsEnricher::$styles->add($pack->apiCode, $css_url);
            }
        }
    }

    protected function findPackByPrefix($prefix)
    {
        if (is_null($this->packs_by_prefix))
        {
            $this->packs_by_prefix = array();
            foreach (IconsEnricher::$settings->packs as $pack)
            {
                $this->packs_by_prefix[$pack->prefix] = $pack;
            }
        }
        if (isset($this->packs_by_prefix[$prefix]))
            return $this->packs_by_prefix[$prefix];
        if (isset($this->packs_by_prefix[$prefix.'-']))
            return $this->packs_by_prefix[$prefix.'-'];
        return null;
    }
}