<?php

require_once __DIR__ . "/../Lib/MotDePasse.php";
require_once __DIR__ . "/../Model/ModelUser.php";
require_once __DIR__ . "/../Model/ModelReponse.php";
require_once __DIR__ . "/../Model/ModelQuestion.php";


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

    public static function qCard() {
        self::afficheVue([
            "pagetitle" => "Questionnaire !",
            "cheminVueBody" => "user/qCard.php",
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
                // header("Location: index.php?action=read&controller=user&login=" . rawurlencode($_GET['login']));
            } else {
                self::afficheVue([
                    "pagetitle" => "Fail Login",
                    "login" => $_GET['login'],
                    "cheminVueBody" => "user/failLogin.php",
                ]);
                // header("Location: frontController.php?action=login&controller=user");
            }
        } else {
            header("Location: index.php");
        }
    }

    public static function testRep() {
        var_dump(ModelQuestion::select("azer2"));
        echo "<br>";
        var_dump(ModelReponse::select("azer"));

    }

}