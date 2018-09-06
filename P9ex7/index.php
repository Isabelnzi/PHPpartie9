<?php
$newDay = strtotime('+20days');
 setlocale(LC_TIME, 'fr_FR.utf8');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>P9ex7</title>
    </head>
    <body>
        <p> <?php echo date('%A %d %B %Y',$newDay); ?></p>
    </body>
</html>

