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

if ($_SERVER['REQUEST METHOD'] == 'POST') {
    $remName = $_POST['remName'] ?? '';

    if (!empty($remName)) {
        foreach ($_SESSION['students'] as $student) {
            if ($student == $remName) {
                delete; 
            }
        }
    }
}
?>

<html>
<head>
    <title>Add Student or Delete Student</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>    
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.php">�bersicht</a></li>
      <li><a href="session.php">Hinzuf�gen</a></li>
    </ul>
  </div>
</nav>

    <h1>Neue Sch&uuml;ler hinzuf&uuml;gen</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="name">Alter:</label>
        <input type="text" id="age" name="age" required />

        <label for="name">Klasse:</label>
        <input type="text" id="classStudent" name="classStudent" required />

        <input type="submit" />
    </form>
    <h1>Sch&uuml;ler aus Liste Entfernen</h1>
    <form method="post">
        <label for="remName">Name:</label>
        <input type="text" id="remName" name="remName" required />

        <input type="submit" />
    </form>

</body>
</html>