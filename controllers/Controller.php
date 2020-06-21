<?php

namespace controllers;

use models\Exercises;

class Controller
{

    public static function controllerName()
    {
        $name = static::class;
        $name = explode('\\', $name);
        $name = end($name);
        $name = substr($name, 0, strpos($name, 'Controller'));
        $name = strtolower($name);
        return $name;
    }

/* views functions */

    public function render($view, $data = []) {
        echo $this->renderLayout($this->renderView($view, $data));
    }

    private function renderLayout($content) {
        $layout = \MVC::getBase()->layout;
        $layoutPath = $_SERVER['DOCUMENT_ROOT'] . "/views/layout/{$layout}.php";

        if (file_exists($layoutPath)) {
            ob_start();
            include $layoutPath;
            return ob_get_clean();
        }
    }

    private function renderView($view, $data) {
        $path = self::controllerName() . '/' . $view;
        $viewPath = $_SERVER['DOCUMENT_ROOT'] . "/views/{$path}.php";

        if (file_exists($viewPath)) {
            ob_start();
            extract($data);
            include $viewPath;
            return ob_get_clean();
        }
    }
}