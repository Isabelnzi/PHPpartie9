<?php
$newDay = strtotime('-22days');
 setlocale(LC_TIME, 'fr_FR.utf8');
?>
 <!DOCTYPE html>
 <html lang="fr" dir="ltr">
   <head>
     <meta charset="utf-8" />
     <title>9ex8</title>
   </head>
   <body>
     <p><?php echo date('%A %d %B %Y',$newDay);?></p>
   </body>
</html>