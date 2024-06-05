<!DOCTYPE html>
<html>

<head>
    <title>HTML und PHP Seite</title>
    <meta charset="utf-8"/>
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
</head>

<body>
    <h1>Liste der Sch�ler</h1>
    <?php
    include 'index2.php';
    $StudentList = CreateStudentList();
    ?>

    <table style="width:100%;">
        <tr>
            <th>Name</th>
            <th>Alter</th>
            <th>Klasse</th>
        </tr>
        <?php foreach ($StudentList as $Student): ?>
        <tr>
            <td><?= htmlspecialchars($Student['name']) ?></td>
            <td><?= htmlspecialchars($Student['alter']) ?></td>
            <td><?= htmlspecialchars($Student['klasse']) ?></td>
        </tr>
        <?php endforeach; ?>
        
              
    </table>


</body>

</html>