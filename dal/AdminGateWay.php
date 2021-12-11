<?php

class AdminGateWay
{
    private $con;

    public function __construct(Connection $con){
        $this->con = $con;
    }

    public function checkAdmin(string $login, string $password) : bool {
        $query ="SELECT password FROM admin WHERE login=:login";
        $this->con->executeQuery($query, array(':login' => array($login,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        if(!empty($results)){
            var_dump($results[0]['password']);
            return password_verify($password,$results[0]['password']);
        }
        return false;
    }

    public function getNbNewsParPage(): int {
        $query = "SELECT nbNewsParPage FROM admin WHERE login=:login";
        $this->con->executeQuery($query, array(':login' => array("user",PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if(empty($results)){
            return 9;
        }
        return $results[0]['nbNewsParPage'];
    }

    public function modifierNbNewsGW(int $nb): bool {
        $query = "UPDATE admin SET nbNewsParPage=:nb WHERE login=:login";
        return $this->con->executeQuery($query, array(
            ':login' => array("user",PDO::PARAM_STR),
            ':nb' => array($nb,PDO::PARAM_INT)
        ));
    }
}