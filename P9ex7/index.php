<?php
$newDay = strtotime('+20days');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>P9ex7</title>
    </head>
    <body>
        <p> <?php echo date('d/m/y',$newDay); ?></p>
    </body>
</html>

