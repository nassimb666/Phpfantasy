<?php

require_once('Character.php');

class Hero extends Character {
    
    private string $_name;
    private string $_weaponName;
    private int $_weaponDamage;
    private string $_shieldName;
    private int $_shieldValue;

    
    public function getName() {
        return $this->_name;
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

    
    public function __construct($name, $weaponName, $weaponDamage, $shieldName, $shieldValue, $initialHealth, $initialRage) {
      
        parent::__construct($initialHealth, $initialRage);

       
        $this->_name = $name;
        $this->_weaponName = $weaponName;
        $this->_weaponDamage = $weaponDamage;
        $this->_shieldName = $shieldName;
        $this->_shieldValue = $shieldValue;
        
        
        echo "Nouveau héros créé : <br> Nom: $name <br> Arme: $weaponName<br> Dégâts de l'arme: $weaponDamage<br> Armure: $shieldName<br> Valeur de l'armure: $shieldValue<br> Santé initiale: $initialHealth<br> Rage initiale: $initialRage<br>";
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
    
    

    public function attack() {
        $damage = 750;
    
        $this->beAttacked($damage);
    
        return $damage;
    }  
}

?>
