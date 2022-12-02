<?php

require_once __DIR__ . "/../Lib/MotDePasse.php";
require_once __DIR__ . "/../Lib/MessageFlash.php";
require_once __DIR__ . "/../Model/ModelUser.php";

class ControllerUser extends GenericController
{

    public static function welcome() {
        self::afficheVue([
            "pagetitle" => "Welcome !",
            "cheminVueBody" => "user/welcome.php",
        ]);
    }

    public static function honey() {
        // TODO
        self::afficheVue([
            "pagetitle" => "HoneyPot !",
            "users" => ModelUser::selectAll(),
            "cheminVueBody" => "user/honey.php",
        ]);
    }

    public static function detente(){
        self::afficheVue([
            "pagetitle" => "Detente !",
            "cheminVueBody" => "user/detente.php",
        ]);
    }

    public static function formSubmit() {
        self::afficheVue([
            "pagetitle" => "Submit !",
            "cheminVueBody" => "user/formSubmit.php",
        ]);
    }

    public static function aPropos() {
        self::afficheVue([
            "pagetitle" => "A Propos !",
            "cheminVueBody" => "user/aPropos.php",
        ]);
    }

    public static function login()
    {
        self::afficheVue([
            "pagetitle" => "Se connecter",
            "cheminVueBody" => "user/login.php",
        ] );
    }

    public static function logined() {
        if (isset($_GET['login']) && isset($_GET['mdp'])) {
            $hash = ModelUser::getHashMdp($_GET['login']);
            if ($hash && MotDePasse::verifier($_GET['mdp'], $hash)) {
                ConnexionUtilisateur::connecter($_GET['login']);
                MessageFlash::ajouter("success", "Vous etes bien connecté !");
                // header("Location: index.php?action=read&controller=user&login=" . rawurlencode($_GET['login']));
            } else {
                MessageFlash::ajouter("warning", "Mauvais mot de passe ou login !");
                // header("Location: frontController.php?action=login&controller=user");
            }
        } else {
            MessageFlash::ajouter("danger", "Il manque le login et/ou le mdp !");
            // header("Location: frontController.php?action=login&controller=user");
        }
    }

}