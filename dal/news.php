<?php

class News
{
    private $titreN;
    private $descriptionN;
    private $lienN;
    private $dateN;
    private $imageN;
    /**
     * @param string $titreN
     * @param string $descriptionN
     * @param string $lienN
     * @param string $dateN
     * @param string $imageN
     */
    public function __construct(string $titreN, string $descriptionN, string $lienN, string $dateN, string $imageN)
    {
        $this->titreN = $titreN;
        $this->descriptionN = $descriptionN;
        $this->lienN = $lienN;
        $this->dateN = $dateN;
        $this->imageN=$imageN;
    }

    /**
     * @return string
     */
    public function getTitreN(): string
    {
        return $this->titreN;
    }

    /**
     * @return string
     */
    public function getImageN(): string
    {
        return $this->imageN;
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

    /**
     * @param string $imageN
     */
    public function setImageN(string $imageN): void
    {
        $this->imageN = $imageN;
    }


}