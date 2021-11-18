<?php

include ('news.php');

    class Site{
        private $nomS;
        private $lienS;
        private $logoS;
        private $fluxRSS;
        private $news;



        /**
         * @param string $nomS
         * @param string $lienS
         * @param string $logoS
         * @param string $fluxRSS
         */
        public function __construct(string $nomS, string $lienS, string $logoS, string $fluxRSS)
        {
            $this->nomS = $nomS;
            $this->lienS = $lienS;
            $this->logoS = $logoS;
            $this->fluxRSS = $fluxRSS;
        }

        /**
         * @return string
         */
        public function getNomS(): string
        {
            return $this->nomS;
        }

        /**
         * @param string $nomS
         */
        public function setNomS(string $nomS): void
        {
            $this->nomS = $nomS;
        }

        /**
         * @return string
         */
        public function getLienS(): string
        {
            return $this->lienS;
        }

        /**
         * @param string $lienS
         */
        public function setLienS(string $lienS): void
        {
            $this->lienS = $lienS;
        }

        /**
         * @return string
         */
        public function getLogoS(): string
        {
            return $this->logoS;
        }

        /**
         * @param string $logoS
         */
        public function setLogoS(string $logoS): void
        {
            $this->logoS = $logoS;
        }

        /**
         * @return string
         */
        public function getFluxRSS(): string
        {
            return $this->fluxRSS;
        }

        /**
         * @param string $fluxRSS
         */
        public function setFluxRSS(string $fluxRSS): void
        {
            $this->fluxRSS = $fluxRSS;
        }

        /**
         * @return array
         */
        public function getNews(): array
        {
            return $this->news;
        }

        /**
         * @param array $news
         */
        public function setNews(array $news): void
        {
            $this->news = $news;
        }
    }
?>