<?php

class PagesController {

    public function home() {
        $title = 'Тестовое задание № 2';
        $description = 'The given task implemented in pure PHP.<br>
        Write a simple bunch Controller-Model-Template for the site only with the pages (
        ie,it has a single table in the database pages: id, friendly, title, description).<br>
        Write tests to the bunch in general.';

        require_once('views/pages/home.php');
    }

    public function error() {
        require_once('views/pages/error.php');
    }

}

?>