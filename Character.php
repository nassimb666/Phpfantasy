<?php

class Character {
    
    private $_health;
    private $_rage;

   
    public function getHealth() {
        return $this->_health;
    }

    public function getRage() {
        return $this->_rage;
    }

   
    public function setHealth($newHealth) {
        $this->_health = $newHealth;
    }

    public function setRage($newRage) {
        $this->_rage = $newRage;
    }

    
    public function __construct($initialHealth, $initialRage) {
        $this->_health = $initialHealth;
        $this->_rage = $initialRage;
    }
    public function isAlive() {
        return $this->getHealth() > 0;
    }
}

?>
