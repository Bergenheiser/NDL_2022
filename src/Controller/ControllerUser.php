<?php

class ControllerUser extends GenericController
{

    public static function welcome() {
        self::afficheVue([
            "pagetitle" => "Welcome !",
            "cheminVueBody" => "user/welcome.php",
        ]);
    }

    public static function honey() {
        self::afficheVue([
            "pagetitle" => "HoneyPot !",
            "cheminVueBody" => "user/welcome.php",
        ]);
    }

}