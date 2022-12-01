<?php

class GenericController
{

    public static function afficheVue(array $parametres = []): void {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        require "../src/View/view.php"; // Charge la vue
    }


    public static function error(string $msg = "non definie")
    {
        self::afficheVue([
            "pagetitle" => "Error",
            "msg" => $msg,
            "cheminVueBody" => "voiture/error.php",
        ] );
    }

}