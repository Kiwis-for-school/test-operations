<!DOCTYPE html>
<html>
// PHP Good
<head>
    <title>PHP Seite mit Datenbank</title>

    <style>
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: burlywood;
        }
    </style>
    
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
      <li><a href="index.php">Übersicht</a></li>
      <li><a href="session.php">Hinzufügen</a></li>
    </ul>
  </div>
</nav>

    <h1>Liste der Sch&uuml;ler</h1>
    <?php
    include 'create-students-show-students.php';
    $StudentList = CreateStudentList();

    if(isset($_GET['delete'])) {
        removeStudent($_GET['delete']);
        header('Location: index.php');
        exit;
    }
    ?>

    <table style="width:100%;">
        <tr>
            <th>Name</th>
            <th>Alter</th>
            <th>Klasse</th>
            <th>Aktion</th>
        </tr>
        <?php foreach ($StudentList as $index => $Student): ?>
        <tr>
            <td><?= htmlspecialchars($Student['name']) ?></td>
            <td><?= htmlspecialchars($Student['alter']) ?></td>
            <td><?= htmlspecialchars($Student['klasse']) ?></td>
            <td><a href="?delete=<?= $index ?>">Löschen</a> || <a href="session.php?edit=<?= $index ?>">Ändern</a></td>
        </tr>
        <?php endforeach; ?>
        
              
    </table>
    <br /><a href="session.php" style="border: 1px solid black; background-color:aliceblue">Hinzufügen</a><br />

</body>

</html>
