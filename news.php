<?php

class News
{
    private string $titreN;
    private string $descriptionN;
    private string $lienN;
    private string $dateN;

    /**
     * @param string $titreN
     * @param string $descriptionN
     * @param string $lienN
     * @param string $dateN
     */
    public function __construct(string $titreN, string $descriptionN, string $lienN, string $dateN)
    {
        $this->titreN = $titreN;
        $this->descriptionN = $descriptionN;
        $this->lienN = $lienN;
        $this->dateN = $dateN;
    }

    /**
     * @return string
     */
    public function getTitreN(): string
    {
        return $this->titreN;
    }

    /**
     * @param string $titreN
     */
    public function setTitreN(string $titreN): void
    {
        $this->titreN = $titreN;
    }

    /**
     * @return string
     */
    public function getDescriptionN(): string
    {
        return $this->descriptionN;
    }

    /**
     * @param string $descriptionN
     */
    public function setDescriptionN(string $descriptionN): void
    {
        $this->descriptionN = $descriptionN;
    }

    /**
     * @return string
     */
    public function getLienN(): string
    {
        return $this->lienN;
    }

    /**
     * @param string $lienN
     */
    public function setLienN(string $lienN): void
    {
        $this->lienN = $lienN;
    }

    /**
     * @return string
     */
    public function getDateN(): string
    {
        return $this->dateN;
    }

    /**
     * @param string $dateN
     */
    public function setDateN(string $dateN): void
    {
        $this->dateN = $dateN;
    }


}