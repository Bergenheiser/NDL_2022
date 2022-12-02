<?php


require_once __DIR__ . "/../Lib/MessageFlash.php";

class GenericController
{

    public static function afficheVue(array $parametres = []): void
    {
        $parametres["messageFlash"] = MessageFlash::lireTousMessages();
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require "../src/View/view.php"; // Charge la vue
    }


    public static function error(string $msg = "non definie")
    {
        self::afficheVue([
            "pagetitle" => "Error",
            "msg" => $msg,
            "cheminVueBody" => "user/error.php",
        ] );
    }

}