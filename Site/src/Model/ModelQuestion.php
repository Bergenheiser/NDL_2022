<?php

require_once __DIR__ . "/DataBaseConnection.php";

use PDOException;

class ModelQuestion
{

    private string $idQuestion;
    private string $titreQuestion;
    private string $texteQuestion;
    private string $idReponse;

    // un constructeur
    public function __construct(string $idQuestion, string $titreQuestion, string $texteQuestion, string $idReponse)
    {
        $this->idQuestion = $idQuestion;
        $this->titreQuestion = $titreQuestion;
        $this->texteQuestion = $texteQuestion;
        $this->idReponse = $idReponse;
    }

    private static function construire(array $userFormatTableau)
    {
        $idQuestion = $userFormatTableau['idQuestion'];
        $titreQuestion = $userFormatTableau['titreQuestion'];
        $texteQuestion = $userFormatTableau['texteQuestion'];
        $idReponse = $userFormatTableau['idReponse'];
        return new static ($idQuestion, $titreQuestion, $texteQuestion, $idReponse);
    }


    public static function selectAll(): array
    {
        try {
            $pdo = DataBaseConnection::getPdo();
            $query = "SELECT * FROM question;";
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

    public static function select(string $idQuestion)
    {
        try {
            $pdo = DataBaseConnection::getPdo();
            $sql = "SELECT * from question WHERE idQuestion=:idQuestion";
            $rep = $pdo->prepare($sql);
            $rep->execute(array("idQuestion" => $idQuestion,));
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

}