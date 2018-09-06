<?php
// déclaration du tableau contenant les mois
$monthList = array('Veuillez choisir un mois', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
//initialisation des variables year et month à 0
$month = 0;
$year = 0;
$case = 1;
//vérification que le formulaire à bien été soumis
if (!empty($_POST['monthList'])) {
    $month = $_POST['monthList'];
}
if (!empty($_POST['yearList'])) {
    $year = $_POST['yearList'];
}
// on vérifie que le formulaire a bien été validé si les valeurs sont différentes de 0.
if (($month != 0) && ($year != 0)) {
    //calcul du nombre de jour dans le mois month
    $dayNumberInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    // calcul du premier jour de la semaine du mois month en format numérique (lundi = 1, dimanche = 7)
    $numberDay = strftime('%u', mktime(0, 0, 0, $month, 1, $year));
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Calendar</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
    </head>
    <body>
        <form method="POST" action="#">
            <label for="monthList">Mois :</label>
            <select name="monthList" id="monthList">
                <?php foreach ($monthList as $monthNumber => $monthName) { ?>
                    <option value="<?= $monthNumber ?>" <?php echo ($monthNumber == 0) ? 'disabled selected' : '';
                echo ($monthNumber == $month) ? 'selected' : ''; ?>><?= $monthName ?></option>
<?php } // ($monthNumber == $month) ? 'selected' : '' permet de garder le choix afficher dans l'input'?>
            </select>
            <label for="yearList">Années :</label>
            <select name="yearList" id="yearList">
                <option selected disabled>Veuillez choisir une année</option>
                <?php for ($yearNumber = 1970; $yearNumber <= 2030; $yearNumber++) { ?>
                    <option value="<?= $yearNumber ?>" <?= ($year == $yearNumber) ? 'selected' : ''; ?>><?= $yearNumber ?></option>
<?php } // ($year == $yearNumber) ? 'selected' : '' permet de garder le choix afficher dans l'input ?>
            </select>
            <input type="submit" value="Afficher" />
        </form>
        <?php
        if (($month != 0) && ($year != 0)) {
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        //boucle permettant d'écrire les chiffres du premier au dernier jour du mois
                        for ($day = 1; $day <= $dayNumberInMonth; $day++) {
                            //condition définnisant l'emplacement du premier jour du mois dans la semaine
                            if (($numberDay != 1) && ($day == 1)) {
                                //boucle définissant le nombre de case vide avant le premier jour du mois
                                for ($case; $case < $numberDay; $case++) {
                                    ?>
                                    <td></td>
                                    <?php
                                }
                            }
                            ?>
                            <td><?= $day ?></td>                            
                            <?php
                            //on compte le nombre de case avant de retourner à la ligne
                            if ((($day + $case - 1) % 7) == 0) {
                                ?>
                            </tr>
                            <tr>
                                <?php
                            }
                            // conditions définissant des cases vides après le dernier jours du mois
                            if (($day == $dayNumberInMonth) && ((($day + $case - 1) % 7) != 0)) {
                                // on détermine quel jour numérique tombe le dernier jour du mois
                                $finalDayInWeek = strftime('%u', mktime(0, 0, 0, $month, $day, $year));
                                // boucle définissant le nombre de case vide après le dernier jour du mois
                                for ($finalCase = $finalDayInWeek; $finalCase < 7; $finalCase++) {
                                    ?>
                                    <td></td>
                                <?php
                                }
                            }
                            ?>
    <?php }
    ?>
                    </tr>
                </tbody>
            </table>
<?php } ?>

    </body>
</html>