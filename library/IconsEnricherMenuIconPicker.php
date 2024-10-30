<?php

defined('ABSPATH') or die('No direct load!'); // Some kind of security

class IconsEnricherMenuIconPicker
{
    /**
     * Регистрирует фильтры
     * @return void
     */
    public function register()
    {
        add_action('admin_footer', array(&$this, '_add_icon_dialog'));
        add_action('admin_enqueue_scripts', array(&$this, '_enqueue_scripts'));
        add_filter('wp_nav_menu_args', array(&$this, '_add_menu_item_title_filter'));
        add_filter('wp_nav_menu', array(&$this, '_remove_menu_item_title_filter'));
    }

    /**
     * Добавление фильтра для the_title
     * @param array $args
     * @return array
     */
    public function _add_menu_item_title_filter($args) {
        add_filter('the_title', array(&$this, '_add_icon'), 999, 2);
        return $args;
    }

    /**
     * Удаление фильтра для the_title
     * @param array $args
     * @return array
     */
    public function _remove_menu_item_title_filter($args) {
        remove_filter('the_title', array(&$this, '_add_icon'), 999, 2);
        return $args;
    }

    /**
     * Является ли текущая страница целевой, той к которой нужно добавить
     * скрипты для выбора иконок пунктов меню
     * @return bool
     */
    public function is_target_page()
    {
        return $GLOBALS['pagenow'] !== 'nav-menus.php';
    }

    /**
     * Изменяет заголовок поста добавляя иконку
     * @param string $title
     * @param int $id
     * @return string
     */
    public function _add_icon($title, $id)
    {
        $meta = $this->get($id);

        if ($meta === null) {
            return $title;
        }

        IconsEnricher::$styles->add($meta['package'], plugins_url($meta['css'], dirname(__FILE__)));

        $styles = array();

        if (isset($meta['color']) && $meta['color'] !== null) $styles['color'] = $meta['color'];
        if (isset($meta['fontSize']) && $meta['fontSize'] !== null) $styles['font-size'] = $meta['fontSize'];

        if (isset($meta['offsetTop']) && $meta['offsetTop'] !== null) $styles['padding-top'] = $meta['offsetTop'];
        if (isset($meta['offsetBottom']) && $meta['offsetBottom'] !== null) $styles['padding-bottom'] = $meta['offsetBottom'];
        if (isset($meta['offsetLeft']) && $meta['offsetLeft'] !== null) $styles['padding-left'] = $meta['offsetLeft'];
        if (isset($meta['offsetRight']) && $meta['offsetRight'] !== null) $styles['padding-right'] = $meta['offsetRight'];

        $icon = '<span class="' . $meta['class'] . '"';

        if (count($styles) > 0) {
            $icon .= ' style="';
            foreach($styles as $property => $value) {
                $icon .= $property . ':' . $value . ';';
            }
            $icon .= '"';
        }

        $icon .= '></span>';

        if ($meta['position'] === 'after') {
            $result = $title . ' ' . $icon;
        } else {
            $result = $icon . ' ' . $title;
        }

        return $result;
    }

    /**
     * Добавление диалога выбора иконки для пункта меню
     * @return void
     */
    public function _add_icon_dialog()
    {
        if (!$this->is_target_page()) {
            return;
        }

        // @todo: Code here
    }

    /**
     * Регистрация скриптов
     * @return void
     */
    public function _enqueue_scripts()
    {
        if (!$this->is_target_page()) {
            return;
        }

        // @todo: Code here
    }

    /**
     * Запоминает иконку для поста
     * @param int $post
     * @param array $data
     * @param string $data['css'] - Путь к css файлу
     * @param string $data['position'] - Позиция иконки
     * @param string $data['class'] - CSS класс иконки
     * @param string $data['package'] - Имя пакета
     * @param string $data['name'] - Имя иконки
     * @param string $data['color'] - Цвет иконки
     * @param string $data['offsetTop'] - Отступ сверху
     * @param string $data['offsetBottom'] - Отступ снизу
     * @param string $data['offsetLeft'] - Отступ слева
     * @param string $data['offsetRight'] - Отступ справа
     * @param string $data['fontSize'] - Размер шрифта
     * @return bool
     */
    public function set($post, $data)
    {
        return update_post_meta($post, '_i8e__icon', $data);
    }

    /**
     * Получает данные иконки
     * @param int $post
     * @return array|null
     */
    public function get($post)
    {
        $meta = get_post_meta($post, '_i8e__icon');

        if (is_array($meta) && count($meta) > 0) {
            return $meta[0];
        }

        return null;
    }

    /**
     * Удаление данных об иконке поста
     * @param int $post
     * @return bool
     */
    public function remove($post)
    {
        return delete_post_meta($post, '_i8e__icon');
    }
}

