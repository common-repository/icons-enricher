<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherAjax
{
    /**
     * Регистрация хуков
     * @return void
     */
    public function register()
    {
        if (current_user_can('edit_theme_options')) {
            add_action('wp_ajax_i8e__get_menu_item_icon', array(&$this, 'get_menu_item_icon'));
            add_action('wp_ajax_i8e__set_menu_item_icon', array(&$this, 'set_menu_item_icon'));
            add_action('wp_ajax_i8e__remove_menu_item_icon', array(&$this, 'remove_menu_item_icon'));
        }
    }

    /**
     * Получение данных об иконке пункта меню
     * @return void
     */
    public function get_menu_item_icon()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        if ($id !== null) {
            $icon = IconsEnricher::$menu->get((int) $id);

            if ($icon !== null) {
                header('HTTP/1.1 200 OK');
                header('Content-type: application/json; charset=utf-8');
                echo wp_json_encode($icon);
                wp_die(); // WordPress не понятно зачем выводит 0 в конце json, выходим - не даём ему это сделать
            }
        }

        header('HTTP/1.1 404 Not Found');
        wp_die();
    }

    /**
     * Установка иконки пункта меню
     * @return void
     */
    public function set_menu_item_icon()
    {
        $id = $this->sanitizePostVar('id');
        $css = $this->sanitizePostVar('css');
        $position = $this->sanitizePostVar('position');
        $class = $this->sanitizePostVar('class');
        $package = $this->sanitizePostVar('package');
        $name = $this->sanitizePostVar('name');
        $category = $this->sanitizePostVar('category');

        if (!in_array(null, array($id, $css, $position, $class, $package, $name, $category))) {
            header('HTTP/1.1 200 OK');
            IconsEnricher::$menu->set((int) $id, array(
                'css' => $css,
                'position' => $position,
                'class' => $class,
                'package' => $package,
                'name' => $name,
                'category' => $category,
                'color' => $this->sanitizePostVar('color'),
                'fontSize' => $this->sanitizePostVar('fontSize'),
                'offsetTop' => $this->sanitizePostVar('offsetTop'),
                'offsetBottom' => $this->sanitizePostVar('offsetBottom'),
                'offsetLeft' => $this->sanitizePostVar('offsetLeft'),
                'offsetRight' => $this->sanitizePostVar('offsetRight'),
            ));
        } else {
            header("HTTP/1.1 404 Not Found");
            wp_die();
        }
    }

    /**
     * Удаление иконки пункта меню
     * @return void
     */
    public function remove_menu_item_icon()
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        if ($id !== null) {
            IconsEnricher::$menu->remove((int) $id);
            header('HTTP/1.1 200 OK');
        } else {
            header("HTTP/1.1 404 Not Found");
        }
        wp_die();
    }

    /**
     * Input data sanitizing
     * @param $option
     * @return null|string
     */
    protected function sanitizePostVar($option)
    {
        $value = $this->postVar($option);

        switch($option)
        {
            case 'id':
            case 'css':
            case 'position':
            case 'class':
            case 'package':
            case 'name':
            case 'category':
                return !is_null($value) ? htmlspecialchars($value) : null;

            case 'color':
            case 'fontSize':
            case 'offsetTop':
            case 'offsetBottom':
            case 'offsetLeft':
            case 'offsetRight':
                return (is_string($value) && (''!==$value)) ? htmlspecialchars($value) : null;
        }
    }

    protected function postVar($option)
    {
        return isset($_POST[$option]) ? $_POST[$option] : null;
    }
}

