<?php

namespace Lab5App\Controllers;

class Controller {
    protected function render($template, $data = []) {
        extract($data);
        include __DIR__ . "/../Views/$template.php";
    }
}

?>