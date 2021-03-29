<?php

require ('Sport.php');
require ('Student.php');
require ('ConnectDb.php');
require ('StudentManager.php');
require ('SportManager.php');
require ('Stats.php');

$student_names=["Abel", "Adon", "Akuma", "Balrog", "Blanka", "Cammy", "Cell", "Chun-Li", "Cody", "C. Viper", "Dan","Dee Jay", "Dhalsim", "Dudley", "E. Honda", "El Fuerte", "Fei Long", "Gen", "Gouken", "Guile", "Guy", "Hakan", "Ibuki", "Juri", "Ken", "Makoto", "M. Bison", "Rose", "Rufus", "Ryu", "Sagat","Sakura", "Seth", "Sangoku", "Sangohan", "Sangoten", "T. Hawk", "Vega","Zangief","Evil Ryu", "Yang", "Yun", "Violent Ken"];

$schools=["a","b","c"];

//$table_sport;

// 1) creation auto aleatoire d'objet étudiant

foreach($student_names as $student_name){

    new Student($student_name, $schools);
   
}

    //var_dump(Student::$student_list);


// 2) creation auto aleatoire d'objet sport

for($i=0; $i<count($student_names); $i++){

    new Sport;
}

    //var_dump(Sport::$_sport_assignement);



// 3) remplissage auto aleatoire de la table etudiant

$dbh = new PDO('mysql:host=localhost;dbname=sport_school', 'root', '');

$manager = new studentManager($dbh);


    //var_dump($manager);


$manager->addStudent(Student::$student_list);



// 4) remplissage auto alétoire de la table sport

$manager2 = new sportManager($dbh);


    //var_dump($manager2);

$manager2->addSport(Sport::$_sport_assignement);

 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Devoir PHP expert n°1</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 
  <h1>Statistiques</h1>

  <h2>A chaque refresh de la page <kbd><kbd>CTRL</kbd></kbd>+<kbd><kbd>F5</kbd></kbd> les données sont modifiées aléatoirements</h2>

<table>
    <tr>
        <th>
        </th>
        <th>
            Ecole A
        </th>
        <th>
            Ecole B
        </th>
        <th>
            Ecole C
        </th>
    </tr>
    <tr>
        <td> 
            <span>Nombre d'élèves</span>
        </td>

        <td>
            <?php $nb_student= new StatsManager($dbh); echo $nb_student->student_number('a'); ?>
        </td>

        <td>
            <?php echo $nb_student->student_number('b'); ?>
        </td>

        <td>
            <?php echo $nb_student->student_number('c'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <span>
            Nombre d’élèves pratiquant au moins un sport
            </span>
        </td>

        <td>
            <?php echo $nb_student->at_least_one('a'); ?>
        </td>
        
        <td>
            <?php echo $nb_student->at_least_one('b'); ?>
        </td>
        
        <td>
            <?php echo $nb_student->at_least_one('c'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <span>
            Nombre d’activités sportives pratiquées
            </span>
            
        </td>

        <td>
            <?php echo $nb_student->how_many_activities('a'); ?>
        </td>

        <td>
            <?php echo $nb_student->how_many_activities('b'); ?>
        </td>

        <td>
            <?php echo $nb_student->how_many_activities('c'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <span>
            Liste des activités sportives pratiquées, classées par ordre croissant en fonction du nombre d’élèves qui les pratiquent et en précisant ce nombre pour chacune des activités
            </span>
        </td>
        
        <td>
            <?php $rows=$nb_student->order_by('a'); ?>
            <ul>
                <?php foreach($rows as $row):?>
                    <li>
                        <?php echo $row[0]." élèves ont choisi: ".$row[1];?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </td>

        
        <td>
            <?php $rows2=$nb_student->order_by('b'); ?>
            <ul>
                <?php foreach($rows2 as $row):?>
                    <li>
                        <?php echo $row[0]." élèves ont choisi: ".$row[1];?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </td>

        <td>
            <?php $rows3=$nb_student->order_by('c'); ?>
            <ul>
                <?php foreach($rows3 as $row):?>
                    <li>
                        <?php echo $row[0]." élèves ont choisi: ".$row[1];?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </td>

    </tr>
</table>
 
</body>
</html>
