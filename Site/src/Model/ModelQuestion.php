<?php

require_once __DIR__ . "/DataBaseConnection.php";
require_once __DIR__ . "/ModelReponse.php";

use PDOException;

class ModelQuestion
{

    private int $idQuestion;
    private string $titreQuestion;
    private string $texteQuestion;

    // un constructeur
    public function __construct(int $idQuestion, string $titreQuestion, string $texteQuestion)
    {
        $this->idQuestion = $idQuestion;
        $this->titreQuestion = $titreQuestion;
        $this->texteQuestion = $texteQuestion;
    }

    private static function construire(array $userFormatTableau)
    {
        $idQuestion = $userFormatTableau['idQuestion'];
        $titreQuestion = $userFormatTableau['titreQuestion'];
        $texteQuestion = $userFormatTableau['texteQuestion'];
        return new static ($idQuestion, $titreQuestion, $texteQuestion);
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

    public static function select(int $idQuestion)
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
            echo $e->getMessage();
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