<?php

class studentManager extends ConnectDb {


	public function addStudent($student_profils)
	{
        $stmt=$this->_db->prepare('SELECT * FROM school');
        $stmt->execute();
        $count = $stmt->rowCount();

        if ( $count == 0 ) {

            foreach ($student_profils as $student){
                $sql="INSERT INTO school(school_id, student_name) VALUES (:school,:student)";
                $stmt=$this->_db->prepare($sql);
                $stmt->bindValue(':school', $student->getRandomSchoolId());
                $stmt->bindValue(':student', $student->getName());
                $stmt->execute();
            }
        }else{

            foreach ($student_profils as $student){
                $sql='UPDATE school SET school_id=:school WHERE student_name=:student';
                $stmt=$this->_db->prepare($sql);
                $stmt->bindValue(':school', $student->getRandomSchoolId());
                $stmt->bindValue(':student', $student->getName());
                $stmt->execute();
            }   
        }

	
		$errors = $stmt->errorInfo();
		if ($errors[0] != '00000') {

			echo 'Erreur SQL ' . $errors[2];

		}else{

			//echo 'La table school a été générée aléatoirement et est enregistrée en base données.<br>';
		}
	}
}







