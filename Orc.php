<?php

require_once('Character.php');

class Orc extends Character {
    private string $_name;
    private string $_type;
    private string $_weaponName;
    private int $_weaponDamage;
    private string $_shieldName;
    private int $_shieldValue;

    public function getName() {
        return $this->_name;
    }

    public function getType() {
        return $this->_type;
    }

    public function getWeaponName() {
        return $this->_weaponName;
    }

    public function getWeaponDamage() {
        return $this->_weaponDamage;
    }

    public function getShieldName() {
        return $this->_shieldName;
    }

    public function getShieldValue() {
        return $this->_shieldValue;
    }

    public function setName($newName) {
        $this->_name = $newName;
    }

    public function setType($newType) {
        $this->_type = $newType;
    }

    public function setWeaponName($newWeaponName) {
        $this->_weaponName = $newWeaponName;
    }

    public function setWeaponDamage($newWeaponDamage) {
        $this->_weaponDamage = $newWeaponDamage;
    }

    public function setShieldName($newShieldName) {
        $this->_shieldName = $newShieldName;
    }

    public function setShieldValue($newShieldValue) {
        $this->_shieldValue = $newShieldValue;
    }

    public function __construct($_name, $_type, $_weaponName, $_weaponDamage, $_shieldName, $_shieldValue, $_initialHealth, $_initialRage) {
        parent::__construct($_initialHealth, $_initialRage);

        $this->_name = $_name;
        $this->_type = $_type;
        $this->_weaponName = $_weaponName;
        $this->_weaponDamage = $_weaponDamage;
        $this->_shieldName = $_shieldName;
        $this->_shieldValue = $_shieldValue;

        echo "<br>Nouvel orc créé : <br> Nom: $_name <br> Type: $_type <br> Arme: $_weaponName <br> Dégâts de l'arme: $_weaponDamage <br> Armure: $_shieldName <br> Valeur de l'armure: $_shieldValue <br> Santé initiale: $_initialHealth <br> Rage initiale: $_initialRage";
    }

    public function attack() {
        $damage = rand(600, 800);
    
        $this->beAttacked($damage);
    
        return $damage;
    }
    

    public function beAttacked($damage) {
        
        if (is_int($damage)) {
            if ($this->getShieldValue() > 0) {
                $actualDamage = max(0, $damage - $this->getShieldValue());
                $this->setHealth($this->getHealth() - $actualDamage);
                return $actualDamage;  
            } else {
                $this->setHealth($this->getHealth() - $damage);
                return $damage;  
            }
        } else {
            
            return "Erreur: Les dégâts doivent être un nombre entier.";
        }
    }
    
}
?>
