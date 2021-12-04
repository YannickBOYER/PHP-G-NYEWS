<?php

class Admin
{
    private string $login;
    private  string $role;

    /**
     * @param string $login
     * @param string $role
     */
    public function __construct(string $login, string $role)
    {
        $this->login = $login;
        $this->role = $role;
    }


    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }


    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }



}