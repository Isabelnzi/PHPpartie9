<?php
$date = new DateTime('16-05-2016 ');
$today = new DateTime('20-08-2018');
  $interval = $date->diff($today);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>9ex6</title>
    </head>
    <body>
        <p><?php echo $interval->format('%R%a jrs depuis le 16/05/2016');?></p>
    </body>
 </html>