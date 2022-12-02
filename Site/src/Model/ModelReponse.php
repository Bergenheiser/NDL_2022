<?php

require_once __DIR__ . "/DataBaseConnection.php";

use PDOException;

class ModelReponse
{

    private int $idReponse;
    private string $texteReponse;
    private int $valide;
    private int $idQuestion;

    // un constructeur
    public function __construct(int $idReponse, string $texteReponse, int $valide, int $idQuestion)
    {
        $this->idReponse = $idReponse;
        $this->texteReponse = $texteReponse;
        $this->valide = $valide;
        $this->idQuestion = $idQuestion;
    }

    public static function construire(array $userFormatTableau)
    {
        $idReponse = $userFormatTableau['idReponse'];
        $texteReponse = $userFormatTableau['texteReponse'];
        $valide = $userFormatTableau['valide'];
        $idQuestion = $userFormatTableau['idQuestion'];
        return new static ($idReponse, $texteReponse, $valide, $idQuestion);
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

    public static function select(int $idReponse)
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

    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }

    public static function findReponses(int $idTrajet) : array {
        try {
            $pdo = DatabaseConnection::getPdo();
            $sql = "SELECT *
                    FROM reponse
                    WHERE idQuestion = :id;";
            $rep = $pdo->prepare($sql);
            $rep->execute(array (
                "id" => $idTrajet,
            ));
            $tab = array();
            foreach ($rep as $tabFormatTrajet) {
                $tab[] = ModelReponse::construire($tabFormatTrajet);
            }
            return $tab;
        } catch (PDOException) {
            return [];
        }
    }

}