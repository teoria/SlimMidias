<?php

Class MainController extends Controller {


    public function index() {


        $this->render(
            "index.php",
            array("title" => "Rest API", "texto" => "API rest desenvolvida para o aplicativo X.")
        );

    }

    public function teste() {

        $this->render(
            "index",
            array("title" => "SlimMidias API", "name" => "Home")
        );
    }

    public function notFound() {

        $this->render("error.php", array(), 404);
    }
}
