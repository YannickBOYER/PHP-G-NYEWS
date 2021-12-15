<?php
/*
 * La classe AdminGateWay va permettre d'intéragir avec la table admin de la base de données
 */
class AdminGateWay
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    /**
     * Cette fonction permet de comparer le mot de passe hashé avec celui qui a été entré dans la base
     */
    public function checkAdmin(string $login, string $password) : bool {
        $query ="SELECT password FROM admin WHERE login=:login";
        $this->con->executeQuery($query, array(':login' => array($login,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if(!empty($results)){
            return password_verify($password,$results[0]['password']);
        }
        return false;
    }

    /**
     * Cette fonction permet de récupérer le nombre de news par pages qui ont été rentrées dans la base
     */
    public function getNbNewsParPage(): int {
        $query = "SELECT nbNewsParPage FROM admin WHERE login=:login";
        $this->con->executeQuery($query, array(':login' => array("user",PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if(empty($results)){
            return 9;
        }
        return $results[0]['nbNewsParPage'];
    }

    /**
     * Cette fonction permet de modifier le nombre de news par pages dans la base
     */
    public function modifierNbNewsGW(int $nb): bool {
        $query = "UPDATE admin SET nbNewsParPage=:nb WHERE login=:login";
        return $this->con->executeQuery($query, array(
            ':login' => array("user",PDO::PARAM_STR),
            ':nb' => array($nb,PDO::PARAM_INT)
        ));
    }
}