<?php

class Utils
{

    public static function writeMsg($file, $msg)
    {
        $text = file_get_contents($file);
        $text .= $msg . "\n";
        file_put_contents($file, $text);
    }

    public static function wipeMsg($file)
    {
        file_put_contents($file, "");
    }

    public static function afficheUser($array): void
    {
        echo "<p> login = " . $array['login'] . "</p>\n";
        echo "<p> mdp = " . $array['mdp'] . "</p>\n";
        echo "<br>";
    }

    public static function afficheArray($array): void
    {
        $n = 0;
        foreach ($array as $key => $value) {
            echo "<p> $key = $value </p>\n";
            $n++;
        }
        echo "<p> nbLigne = $n </p>";

    }

    public static function detectFin($time): void
    {
        //$t = new Sleep($time);
        //$t->start();

    }


}