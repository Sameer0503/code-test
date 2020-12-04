<?php 
    class Servers{
        private int $numberOfServers = 0;
        private $loads = [];
        private int $interval = 5;
        
        /**
         * Calculate number of servers running after given interval
         * @return int $numberOfServers
         */
        public function serverLoad(){
            // was incorrect $numberOfServers = 0; 
            foreach($this->loads as $load){
                if($load < 50){
                    $this->numberOfServers = $this->numberOfServers/2;
                }else{
                    $this->numberOfServers = (2 * $this->numberOfServers) + 1;
                }
            }
            return $this->numberOfServers;
        }

        /**
         * Set number of servers
         * @param int $numberOfServers
         */
        public function setNumberOfServers(int $numberOfServers){
            $this->numberOfServers = $numberOfServers;
        }

        /**
         * Set interval
         * @param int $interval
         */
        public function setInterval(int $interval){
            $this->interval = $interval;
        }

        /**
         * Set server loads
         * @param int $load
         */
        public function setLoads(int $load){
            array_push($this->loads, $load);
        }

        /**
         * Get interval
         * @return int $interval
         */
        public function getInterval(){
            return $this->interval;
        }

        /**
         * Get interval
         * @return array $interval
         */
        public function getLoad(){
            return $this->loads;
        }
    }

$object = new Servers;
echo "Enter number of servers ";

// Get user input through terminal
$numberOfServers = (int)fgets(STDIN);

$object->setNumberOfServers($numberOfServers);
    for($interval=$object->getInterval(); $interval>0; $interval--){
        echo "Enter load: ";
        $load = (int)fgets(STDIN);
        $object->setLoads($load);        
    }
// Output of program
echo "Servers running: " . $object->serverLoad();

?>