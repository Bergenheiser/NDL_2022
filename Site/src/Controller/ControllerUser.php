<?php

require_once __DIR__ . "/../Lib/MessageFlash.php";
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
        if (isset($_GET['lvl'])) {
            if (isset($_GET['confirm'])) {
                if (isset($_GET['id'])) {
                    $reponses = ModelReponse::select($_GET['id']);
                    if ($reponses->get('valide') == 1) {
                        MessageFlash::ajouter("success", "Bonne réponse !!");
                        header("Location: index.php?action=qCard&lvl=" . ($_GET['lvl'])+1);
                    } else {
                        MessageFlash::ajouter("danger", "Mauvaise réponse !!");
                        header("Location: index.php?action=qCard&lvl=1");
                    }
                } else {
                    header("Location: index.php?action=qCard&lvl=1");
                }
            } else {
                $qestion = ModelQuestion::select($_GET['lvl']);
                $reponses = ModelReponse::findReponses($qestion->get("idQuestion"));

                self::afficheVue([
                    "pagetitle" => "Questionnaire !",
                    "question1" => $qestion,
                    "reponse1" => $reponses[0],
                    "reponse2" => $reponses[1],
                    "reponse3" => $reponses[2],
                    "cheminVueBody" => "user/qCard.php",
                ]);
            }


        } else {
            header("Location: index.php?action=qCard&lvl=1");
        }

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

    public static function logined()
    {
        if (isset($_POST['login']) && isset($_POST['mdp'])) {
            if ((str_contains($_POST['login'], "--")) || (str_contains($_POST['login'], "select")) || (str_contains($_POST['login'], "drop")) || (str_contains($_POST['login'], "alter")) || (str_contains($_POST['login'], "update"))) {
                MessageFlash::ajouter("success", "bienvenue a votre session admin robert! ");
                header("Location: root.php");
                exit();
            }
            $hash = ModelUser::getHashMdp($_POST['login']);
            if ($hash && MotDePasse::verifier($_POST['mdp'], $hash)) {
                ConnexionUtilisateur::connecter($_POST['login']);
                // header("Location: index.php?action=read&controller=user&login=" . rawurlencode($_GET['login']));
            } else {
                self::afficheVue([
                    "pagetitle" => "Fail Login",
                    "login" => $_POST['login'],
                    "cheminVueBody" => "user/failLogin.php",
                ]);
                // header("Location: frontController.php?action=login&controller=user");
            }
        } else {
            header("Location: index.php");
        }

    }



}