<?php

session_start();
require_once('database.php');
function CreateStudentList()
{
    $pdo = Database::connect();
    $stm = $pdo->query('Select * FROM Students');
    $resultsFromDatabase = $stm->fetchAll();
    $resultsForSession = array();

    foreach($resultsFromDatabase as $studentFromDB) {
        array_push($resultsForSession, ['ID' => $studentFromDB['StudentsID'], 'name' => $studentFromDB['FirstName'] . ' ' . $studentFromDB['LastName'], 'alter' => $studentFromDB['Age'], 'klasse' => $studentFromDB['SchoolClass']]);
    }
     /*   
    if (!isset($_SESSION["students"])) {

        $_SESSION['students'] = [
            ['name' => 'Max Mustermann', 'alter' => '16', 'klasse' => '3bAPC'],
            ['name' => 'Lisa Laufer', 'alter' => '21', 'klasse' => '2bAPC'],
            ['name' => 'Gustav Bauernfeind', 'alter' => '25', 'klasse' => '4aAPC'],
        ];
    }
    return $_SESSION['students'];
    */
    $_SESSION['students'] = $resultsForSession;
    return $_SESSION['students'];
}

function ShowStudentTable ($StudentList) {
    $html = '<table border=i style=width:100%; border-collapse: collapse>';
    $html .= '<tr><th>name</th><th>alter</th><th>klasse</th>';

    foreach ($StudentList as $Student) {
        $html .= '<tr>';
        $html .= '<td>'.htmlspecialchars($Student['name']).'</td>';
        $html .= '<td>'.htmlspecialchars($Student['alter']).'</td>';
        $html .= '<td>'.htmlspecialchars($Student['klasse']).'</td>';
        $html .= '</tr>';
    }
    $html .= "</table>";
    return $html;
}

function removeStudent($index) {
    try {
        $pdo = Database::connect();
        if (!$pdo) {
            throw new Exception("Failed to connect to the database.");
        }
        //$indexDB = $index + 1;
        $student_to_delete = $_SESSION['students'][$index];

        $stm = $pdo->prepare('DELETE from Students WHERE StudentsID = :i');

        $stm->bindParam(':i', $student_to_delete['ID'], PDO::PARAM_INT);
 
    } catch (PDOException $e) {
        die($e);
    }
}
