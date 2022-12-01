<?php

class ControllerUser extends GenericController
{

    public static function welcome() {
        self::afficheVue([
            "pagetitle" => "Welcome !",
            "cheminVueBody" => "user/error.php",
        ] );
    }

}