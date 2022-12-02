<?php

require_once __DIR__ . "/DataBaseConnection.php";

use PDOException;

class ModelReponse
{

    private string $idReponse;
    private string $titreReponse;
    private string $texteReponse;

    // un constructeur
    public function __construct(string $idReponse, string $titreReponse, string $texteReponse)
    {
        $this->idReponse = $idReponse;
        $this->titreReponse = $titreReponse;
        $this->texteReponse = $texteReponse;
    }

    private static function construire(array $userFormatTableau)
    {
        $idReponse = $userFormatTableau['idReponse'];
        $titreReponse = $userFormatTableau['titreReponse'];
        $texteReponse = $userFormatTableau['texteReponse'];
        return new static ($idReponse, $titreReponse, $texteReponse);
    }

    public static function selectAll(): array
    {
        try {
            $pdo = DataBaseConnection::getPdo();
            $query = "SELECT * FROM reponse;";
            $pdoStatement = $pdo->query($query);
            $tab = array();
            foreach ($pdoStatement as $userTab) {
                $tab[] = self::construire($userTab);
            }
            return $tab;
        } catch (PDOException $e) {
            return [];
        }

    }

    public static function select(string $idReponse)
    {
        try {
            $pdo = DataBaseConnection::getPdo();
            $sql = "SELECT * from reponse WHERE idReponse=:idReponse";
            $rep = $pdo->prepare($sql);
            $rep->execute(array("idReponse" => $idReponse,));
            $user = $rep->fetch();

            if (!$user) {
                return null;
            }
            return static::construire($user);
        } catch (PDOException $e) {
            return null;
        }

    }

}