<?php

class Sport {

    private static $increment = 1;
    //obligation de générer un id qui va nous permettre d'avoir un id répété ou non, aleatoire dans la table.
    private $_id;
    private $_student_choice;
    public static $_sport_assignement = [];

    public function __construct(){
        
        $this->_id = self::$increment;
        self::$increment++;
    //id qui s'auto incremente a chaque création d'un objet Sport
        $this->_student_choice=$this->setStudent_choice();
        self::$_sport_assignement[]=$this;
    }

    public function setStudent_choice() {

    //fonction qui retourne un tableau contenant aléatoirement le chiffre 1... jusqu'a 6 un nombre de fois égale 1 à 3 de façon aléatoire.

        for($i=0; $i<=rand(0,2);$i++){
            $sport_table[]=rand(1,6);
        }
        return $sport_table;
    }

    public function getId(){
        return $this->_id;
    }

    public function getStudent_choice(){
        return $this->_student_choice;
    }

}


