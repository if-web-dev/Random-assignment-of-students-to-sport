<?php 

class sportManager extends ConnectDb {

	public function addSport($student_profils){

    $stmt=$this->_db->prepare('SELECT * FROM student_activity');
    $stmt->execute();
    $count = $stmt->rowCount();

    if ( $count == 0 ) {
        foreach ($student_profils as $student){

            for($i=0; $i<count($student->getStudent_choice()); $i++){

                $sql="INSERT INTO student_activity (id_student, id_sport) VALUES (:student, :sport)";
                $stmt=$this->_db->prepare($sql);
                $stmt->bindValue(':sport', $student->getStudent_choice()[$i]);
                $stmt->bindValue(':student',$student->getID());
                $stmt->execute();
            }
        }

    }else{

        $sql="TRUNCATE TABLE student_activity";
        $stmt=$this->_db->prepare($sql);
        $stmt->execute();

        foreach ($student_profils as $student){
    
            for($i=0; $i<count($student->getStudent_choice()); $i++){

                $sql="INSERT INTO student_activity (id_student, id_sport) VALUES (:student, :sport)";
                $stmt=$this->_db->prepare($sql);
                $stmt->bindValue(':sport', $student->getStudent_choice()[$i]);
                $stmt->bindValue(':student',$student->getID());
                $stmt->execute();
            }
        }      
    }
        //gestion des erreurs
        $errors = $stmt->errorInfo();
        if ($errors[0] != '00000') {
            echo 'Erreur SQL ' . $errors[2];

        }else{

            //echo 'Le sport a été généré aléatoirement pour l\'élève dont l\'id est et enregistré en base données.<br>';
        }
    }
}



