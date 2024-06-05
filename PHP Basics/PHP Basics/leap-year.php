<html>
<header>
    <style>
        h4 {
            color: #121212;
            text-decoration:underline;
            font-size:36px;
        }
        div, h4, footer {
            text-align: center;
        }
        div {
            font-size: 24px;
        }
    </style>
    <h4>Leap Year Checking Little Program to Practice the Interweaving of PHP and HTML by Michael Wagner</h4>
</header>
<body>
<?php

$year = (int) 1900; // Change this variable to change the year
$leapYear = (bool) false;

switch($year) {
    case ($year%400 == 0):
        $leapYear = true;
        break;
    case ($year%4 == 0 && $year%100 != 0):
        $leapYear = true;
        break;
    default:
        $leapYear = false;
        break;
}

echo "<div>" . $year . " is gonna be a leap year, right?</div><br><div><b>";
if ($leapYear) {
    echo "Yes!</div></b>";
} else {
    echo "No!</div></b>";
}
?>
</body>
<footer>
    <br /><br /><br /><br /><br />
    <?php
    echo date("d.m.y");
    ?>
</footer>
</html>