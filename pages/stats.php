<?php
    include('../inc/functions.php');
    $stats = get_jobs_stats();
?>
<html>
    <head>
        <title>Statistiques par emploi</title>
    </head>
    <body>
    <p><a href="index.php">&larr; Retour aux départements</a></p>
    <h1>Statistiques par emploi</h1>

    <table border="1">
        <tr>
            <th>Emploi</th>
            <th>Hommes</th>
            <th>Femmes</th>
            <th>Total</th>
            <th>Salaire moyen</th>
        </tr>
        <?php
            // moyenne general
            $m=0;
            for ($j=0; $j < count($stats); $j++) { 
            $m=$m+$stats[$j]['salaire_moyen'];
            }
            $moygen=$m/count($stats);

            // ******
            
            
            $css="ftfyt";
            foreach ($stats as $row) { ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['nb_hommes'] ?></td>
                    <td><?= $row['nb_femmes'] ?></td>
                    <td><?= $row['nb_total'] ?></td> 

                    <?php if ($row['salaire_moyen']>=$moygen) { 
                       $color="red";
                    } 
                    else {
                       $color="green";
                    }
                    ?>
                    <td  style="background-color: <?php echo  $color ?>;"><?= number_format($row['salaire_moyen'], 0, ',', ' ') ?> €</td>
                    
                    
                </tr><?php }?>
    


        


    </table>
    </body>
</html>
