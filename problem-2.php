<?php 
    class Restaurent{
        private int $numberOfBreads = 0;
        private int $numberOfRemainingBreads = 0;
        private int $numberOfVada = 0;
        private int $numberOfSamosa = 0;
        private int $costOfVada = 0;
        private int $costOfSamosa = 0;
        private int $breadsRequiredForVada = 2;
        private int $breadsRequiredForSamosa = 2;

        /**
         * Calculate maximum profit
         * @return int $maxProfit
         */
        public function generateMaxProfit(){
            $maxProfit = 0;
            if($this->costOfVada > $this->costOfSamosa){
                $this->numberOfRemainingBreads = $this->numberOfBreads;
                $profitByVada = $this->profitByVada($this->numberOfVada);
                $profitBySamosa = $this->profitBySamosa($this->numberOfSamosa);
                $maxProfit = $profitByVada + $profitBySamosa;
            }else{
                $this->numberOfRemainingBreads = $this->numberOfBreads;
                $profitBySamosa = $this->profitBySamosa($this->numberOfSamosa);
                $profitByVada = $this->profitByVada($this->numberOfVada);
                $maxProfit = $profitByVada + $profitBySamosa;
            }
            return $maxProfit;
        }

        /**
         * Calculate maximum profit by vada
         * @param int $numberOfVada
         * @return int $profitByVada
         */
        public function profitByVada(int $numberOfVada){
            $numberOfVadaPossible = $numberOfVada;
            $profitByVada = 0;
            $checkValue = $this->numberOfRemainingBreads - ($numberOfVadaPossible * $this->breadsRequiredForVada);
            if($checkValue < 0){
                $numberOfVadaPossible--;
                $this->profitByVada($numberOfVadaPossible);
            }else{
                $this->numberOfRemainingBreads = $this->numberOfRemainingBreads - ($numberOfVada * $this->breadsRequiredForVada);
            }
            $profitByVada = $numberOfVadaPossible * $this->costOfVada;
            return $profitByVada;
        }

        /**
         * Calculate maximum profit by Samosa
         * @param int $numberOfSamosa
         * @return int $profitBySamosa
         */
        public function profitBySamosa(int $numberOfSamosa){
            $numberOfSamosaPossible = $numberOfSamosa;
            $profitBySamosa = 0;
            $checkValue = $this->numberOfRemainingBreads - ($numberOfSamosaPossible * $this->breadsRequiredForSamosa);
            if($checkValue < 0){
                $numberOfSamosaPossible--;
                $this->profitBySamosa($numberOfSamosaPossible);
            }else{
                $this->numberOfRemainingBreads = $this->numberOfRemainingBreads - ($numberOfSamosa * $this->breadsRequiredForSamosa);
            }
            $profitBySamosa = $numberOfSamosaPossible * $this->costOfSamosa;
            return $profitBySamosa;
        }

        /**
         * Get number of breads
         * @return int $numberOfBreads
         */
        public function getBread(){
            return $this->numberOfBreads;
        }
        
        /**
         * Get number of vada
         * @return int $numberOfVada
         */
        public function getVada(){
            return $this->numberOfVada;
        }

        /**
         * Get number of samosa
         * @return int $numberOfSamosa
         */
        public function getSamosa(){
            return $this->numberOfSamosa;
        }

        /**
         * Set cost of vada
         * @param int $costOfVada
         */
        public function setCostOfVada(int $cost){
            $this->costOfVada = $cost;
        }

        /**
         * Set cost of samosa
         * @param int $costOfSamosa
         */
        public function setCostOfSamosa(int $cost){
            $this->costOfSamosa = $cost;
        }

        /**
         * Set number of breads
         * @param int $numberOfBreads
         */
        public function setBread(int $numberOfBreads){
            $this->numberOfBreads = $numberOfBreads;
        }

        /**
         * Set number of vada
         * @param int $numberOfVada
         */
        public function setVada(int $numberOfVada){
            $this->numberOfVada = $numberOfVada;
        }

        /**
         * Set number of samosa
         * @param int $numberOfSamosa
         */
        public function setSamosa(int $numberOfSamosa){
            $this->numberOfSamosa = $numberOfSamosa;
        }

    }

    $object = new Restaurent;

    // get user input through terminal
    echo('Number of breads: ');
    $bread = (int)fgets(STDIN);
    echo('Number of vada: ');
    $vada = (int)fgets(STDIN);
    echo('Number of samosa: '); 
    $samosa = (int)fgets(STDIN); 
    echo('Cost of Vada: ');
    $costVada = (int)fgets(STDIN); 
    echo('Cost of Samosa: ');
    $costSamosa = (int)fgets(STDIN); 

    $object->setBread($bread);
    $object->setVada($vada);
    $object->setSamosa($samosa);
    $object->setCostOfVada($costVada);
    $object->setCostOfSamosa($costSamosa);

    // output of program
    echo 'Maximum Profit Possible: '.$object->generateMaxProfit();
?>