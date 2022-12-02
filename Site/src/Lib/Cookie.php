<?php


class Cookie {

    public static function contient($cle) : bool {
        return isset($_COOKIE[$cle]);
    }

    public static function enregistrer(string $cle, mixed $valeur, ?int $dureeExpiration = null): void
    {
        if (is_null($dureeExpiration)) {
            setcookie($cle, serialize($valeur));
        } else {
            setcookie($cle, serialize($valeur), $dureeExpiration);
        }
    }

    public static function lire(string $cle): mixed
    {
        return self::contient($cle) ? unserialize($_COOKIE[$cle]) : null;
    }

    public static function supprimer($cle) : void {
        if (self::contient($cle)) {
            unset($_COOKIE[$cle]);
            setcookie ($cle, "", time()-1);
        }
    }

}