<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 5:41 PM
 */


$routes = array(
    '/' => '',
    
    '/teste'=> "MainController:teste@get" // Classe :  Método  @ tipo Action


    /*'/demo' => array(
        "get" =>  Main:test2 ,
        "post" => "Main:test3"
    ) */
);

$erroHandler = "MainController:notFound";

$basePath = "http://localhost/SlimMidias/public/";

$debug = true;
