<?php

session_start();
require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $class = $_POST['classStudent'] ?? '';

    if (!empty($name) && !empty($age) && !empty($class)) {
       
        $_SESSION['students'][] = ['name' => $name, 'alter' => (int) $age, 'klasse' => $class];
        header('Location: index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $pdo = Database::connect();
        $stm = $pdo->query('Select * FROM Students');
        $resultsFromDatabase = $stm->fetchAll();

    if (isset($_GET['edit'])) {

        $index = $_GET['edit'];

        $studentFromSession = $_SESSION["students"][$index];
        
        if (!empty($name) && !empty($age) && !empty($class)) {
            $_SESSION['students'][$index] = ['name' => $name, 'alter' => (int) $age, 'klasse' => $class];

            $stmt = $pdo->query("UPDATE Students SET FirstName = ".$name.", Age = ".$age.", SchoolClass = ".$class." WHERE StudentsID = ".$indexDB);
            
            header('Location: index.php');
            exit;
        }
    }
    else {
        /*
        array_push($_SESSION["students"], ['name' => '', 'alter' => '' , 'klasse' => '']);
        $studentFromSession = $_SESSION["students"] = ['name' => ' ', 'alter' => ' ', 'klasse' => ' '];

        $index = $studentFromSession.length;
        $stmt = $pdo->query("INSERT INTO Students (StudentsID, FirstName, Age, SchoolClass) VALUES (".($indexDB+1).", ".$name.", ".$age.", ".$class.")");
        */
    }
}

?>

<html>
<head>
    <title>Add Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>    
<body>
    <h1>Neue Sch&uuml;ler hinzuf&uuml;gen</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($studentFromSession['name'])  ? $studentFromSession['name'] : ' ' ?>" />

        <label for="name">Alter:</label>
        <input type="text" id="age" name="age" required value="<?= isset($studentFromSession['alter'])  ? $studentFromSession['alter'] : ' ' ?>" />

        <label for="name">Klasse:</label>
        <input type="text" id="classStudent" name="classStudent" required value="<?= isset($studentFromSession['klasse'])  ? $studentFromSession['klasse'] : ' ' ?>" />

        <input type="submit" />
    </form>
</body>
</html>