<?php
$number = cal_days_in_month(CAL_GREGORIAN, 2, 2016); 
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>P8ex1</title>
    </head>
    <body>
        <p><?php echo "il y a {$number}  jour en février 2016";?></p>
    </body>
</html>
