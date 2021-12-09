<?php

class Admin
{
    private $loginA;
    private $role;


    public function __construct(string $loginA, string $role)
    {
        $this->loginA = $loginA;
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
    public function getLoginA(): string
    {
        return $this->loginA;
    }

    /**
     * @param string $loginA
     */
    public function setLoginA(string $loginA): void
    {
        $this->loginA = $loginA;
    }



}