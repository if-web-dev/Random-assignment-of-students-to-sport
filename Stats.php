<?php 

class StatsManager extends ConnectDb {

    //fonction permettant d'obtenir le nombre d'eleve suivant l'école

    public function student_number($school) {

        $sql="SELECT student_id FROM school WHERE school_id=:school";
        $stmt=$this->_db->prepare($sql);
        $stmt->bindValue(':school',(string)$school);
        $stmt->execute();   
        $count = $stmt->rowCount();
        return $count;

    } 

    //fonction permettant d'avoir le nombre d'eleves pratiquant au moins un sport suivant l'école

    public function at_least_one($school) {

        $sql="SELECT DISTINCT student_id FROM school AS A
        INNER JOIN student_activity AS B
        ON A.student_id = B.id_student
        INNER JOIN activity AS C
        ON B.id_sport= C.id_activity
        WHERE C.id_activity!=1 AND A.school_id=:school";
        $stmt=$this->_db->prepare($sql);
        $stmt->bindValue(':school',(string)$school);
        $stmt->execute();   
        $count = $stmt->rowCount();
        return $count;
    } 


    //fonction permettant d'avoir le nombre d'activités sportives pratiquée suivant les écoles

    public function how_many_activities($school){

        $sql="SELECT DISTINCT id_activity FROM activity AS C
        INNER JOIN student_activity AS B
        ON C.id_activity = B.id_sport
        INNER JOIN school AS A
        ON B.id_student = A.student_id
        WHERE C.id_activity!=1 AND A.school_id=:school";
        $stmt=$this->_db->prepare($sql);
        $stmt->bindValue(':school',(string)$school);
        $stmt->execute();   
        $count = $stmt->rowCount();
        return $count;
    }

    //Liste des activités sportives classées par ordre croissant en fonction du nombre d’élèves qui les pratiquent 
     
    public function order_by($school){

        $sql="SELECT COUNT(A.id_student),B.sport
        FROM student_activity AS A
        INNER JOIN activity AS B
        ON A.id_sport = B.id_activity
        INNER JOIN school AS C
        ON A.id_student= C.student_id
        WHERE C.school_id=:school AND B.id_activity!=1
        GROUP BY B.sport
        ORDER BY COUNT(A.id_student);";
        $stmt=$this->_db->prepare($sql);
        $stmt->bindValue(':school',(string)$school);
        $stmt->execute(); 
        return $stmt->fetchAll();
        
    }


}  

