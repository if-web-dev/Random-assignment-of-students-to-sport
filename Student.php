<?php

class Student {

    //Pas d'id car créé en auto incrément dans la db
    private $_name;
    private $_random_school_id;
    //on stocke tous les objets student crées dans:
    public static $student_list = [];

    public function __construct($student_name,$schools){

        
        $this->_name= $student_name;
        $this->_random_school_id = $schools[rand(0,2)];
        self::$student_list[]=$this;
    }

    public function getName() {
        return $this->_name;
    }
    public function getRandomSchoolID() {
        return $this->_random_school_id;
    }

    //setters inutiles ici les Objets sont auto générés.
}

//creation des objets étudiants avec leur école

