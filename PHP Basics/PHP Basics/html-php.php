<!DOCTYPE html>
<html>

<head>
    <title>HTML und PHP Seite</title>
    <meta charset="utf-8"/>
</head>

<body>
    <h1>Liste der Sch�ler</h1>
    <?php
    include 'index2.php';
    $StudentList = CreateStudentList(StudentList);

    
    ?>


</body>

</html>
