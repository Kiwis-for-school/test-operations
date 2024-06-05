<?php

session_start();

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
?>

<html>
<head>
    <title>Remove Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>    
<body>
    <h1>Sch&uuml;ler entfernen</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <input type="submit" />
    </form>
</body>
</html>