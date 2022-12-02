<?php

require_once "Session.php";

class ConnexionUtilisateur
{
    // L'utilisateur connecté sera enregistré en session associé à la clé suivante
    private static string $cleConnexion = "_utilisateurConnecte";

    public static function connecter(string $loginUtilisateur): void
    {
        Session::getInstance()->enregistrer(static::$cleConnexion, $loginUtilisateur);
    }

    public static function estConnecte(): bool
    {
        return Session::getInstance()->contient(static::$cleConnexion);
    }

    public static function deconnecter(): void
    {
        Session::getInstance()->supprimer(static::$cleConnexion);
    }

    public static function getLoginUtilisateurConnecte(): ?string
    {
        return self::estConnecte() ? Session::getInstance()->lire(static::$cleConnexion) : null;
    }

    public static function estUtilisateur($login): bool
    {
        return self::estConnecte() && strcmp(self::getLoginUtilisateurConnecte(), $login) == 0;
    }

    /*
    public static function estAdministrateur() : bool
    {
        return self::estConnecte() && (new UserRepository)->getEstAdmin(self::getLoginUtilisateurConnecte());
    }
    */

}