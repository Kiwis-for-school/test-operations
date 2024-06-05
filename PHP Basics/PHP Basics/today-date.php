<!DOCTYPE html>
<html>

<head>
    <title>Meine erste PHP Seite</title>
</head>

<body>
    <div>This is pure HTML</div>
    <div>Next one will contain some PHP code</div>
    <div>
        Today's date is <?php echo date("y/m/d") ?> and it's a <?php echo date("l") ?>
    </div>

    <div>
        <?php
        echo 'Today is '. '<b>' . date("d/m/y") . '</b>';
        ?>
    </div>
    <div>
        <?php
        $employees = array('John', 'Mike', 'Barbara', 'Tabea');
        ?>
        <h1>List of employees</h1>
        <ul>
        <?php foreach($employees as $employee){
                echo '<li>'.$employee.'</li>';        
              } ?>
        </ul>
    </div>
</body>

</html>
