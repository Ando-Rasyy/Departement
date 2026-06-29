
<?php
    include('../inc/functions.php');

    if (!isset($_GET["indice"])){
        $departments = get_all_departments("ASC");
        $ordre="croissant";
      
    }
    else{
        $departments = get_all_departments("DESC");
        $ordre="decroissant";
        $_GET["indice"]=0;

    }
  ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thème Dark — TP données réelles</title>
    <link rel="stylesheet" href="../design/style.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li class="brand">Employés DB</li>
            <li><a href="#" class="active">Départements</a></li>
            <li><a href="#">Rechercher</a></li>
            <li><a href="#">Statistiques</a></li>
            <li><a href="#">Ajouter un employé</a></li>
        </ul>
    </nav>

    
   


    <div class="container">
        <h1>Thème « Dark »</h1>
        <p class="text-muted">Mode sombre, accents violets, coins arrondis.</p>

        <h2>Messages</h2>
        <div class="alert alert-success">Enregistrement effectué avec succès.</div>
        <div class="alert alert-error">La date de début ne peut pas être antérieure à l'actuelle.</div>

        <h2>Boutons</h2>
        <p>
            <a href="#" class="btn">Bouton principal</a>
            <a href="#" class="btn btn-secondary">Bouton secondaire</a>
            <button type="button" class="btn">Action</button>
        </p>

        <?php
        if ($ordre=="croissant"){ ?>
            <p><a href="index.php?indice=1"><button type="button" class="btn">croissant</button></a></p>
        <?php }

        else {
            ?> <p><a href="index.php"><button type="button" class="btn">decroissant</button></p><?php
        }
    ?>

        <h2>Tableau</h2>
        <table class="table">
            <thead>
                <tr><th>N°</th><th>Nom du département</th><th>Manager actuel</th><th>Nb employés</th><th>Action</th></tr>
            </thead>
            <tbody>

        <?php foreach ($departments as $line) {?>
            <tr>
            <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></td>
            <td><?=$line['dept_name']?></td>
            <td><?= $line['manager_name'] ?? '—' ?></td>
            <td><?= $line['nb_employees'] ?></td>
            <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
            </tr>
        <?php } ?>
            
            </tbody>
        </table>


        <a href="stats.php">stat</a>

        <!-- ddgegdygdg -->
      

<!-- gegdehd -->

        <div class="pagination">
            <a href="#">&larr; Précédent</a>
            <span class="current">Page 2 / 12</span>
            <a href="#">Suivant &rarr;</a>
        </div>

        <h2 class="mt">Liste</h2>
        <ul class="list">
            <li><a href="#">Élément 1</a></li>
            <li><a href="#">Élément 2</a></li>
            <li><a href="#">Élément 3</a></li>
        </ul>

        <h2 class="mt">Carte / Fiche</h2>
        <div class="card">
            <h3>Georgi Facello</h3>
            <p class="text-muted">Senior Engineer — Development</p>
            <table class="table">
                <tr><th>N°</th><td>10001</td></tr>
                <tr><th>Date d'embauche</th><td>1986-06-26</td></tr>
                <tr><th>Salaire actuel</th><td>88 958 €</td></tr>
            </table>
        </div>

        <h2 class="mt">Formulaire</h2>
        <div class="card">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="first_name">Prénom</label>
                    <input class="form-control" type="text" id="first_name" name="first_name">
                </div>
                <div class="form-group">
                    <label for="gender">Genre</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="M">M</option><option value="F">F</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hire_date">Date d'embauche</label>
                    <input class="form-control" type="date" id="hire_date" name="hire_date">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" id="is_manager" name="is_manager" value="1">
                    <label for="is_manager">Est manager de ce département</label>
                </div>
                <button type="submit" class="btn">Enregistrer</button>
            </form>
        </div>

        <h2 class="mt">Formulaire en ligne (recherche)</h2>
        <div class="card">
            <form action="#" method="get" class="form-inline">
                <div class="form-group">
                    <label for="dept">Département</label>
                    <select class="form-control" id="dept" name="dept_no">
                        <option value="">— Tous —</option><option value="d005">Development</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input class="form-control" type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="age_min">Âge min</label>
                    <input class="form-control" type="number" id="age_min" name="age_min">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Rechercher</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>




<!-- 
<?php
    include('../inc/functions.php');

    if (!isset($_GET["indice"])){
        $departments = get_all_departments("ASC");
        $ordre="croissant";
      
    }
    else{
        $departments = get_all_departments("DESC");
        $ordre="decroissant";
        $_GET["indice"]=0;

    }
  

?>		
<html>
    <head>
        <title>Les news</title>
    </head>
    <body>
    <h1>Liste des départements</h1>
    <p><a href="search.php">🔍 Rechercher un employé</a></p>
    <p><a href="stats.php">📊 Statistiques par emploi</a></p>
    <p><a href="dept_form.php">➕ Ajouter un département</a></p>
    <p><a href="emp_form.php">➕ Ajouter un employé</a></p>

    <?php
        if ($ordre=="croissant"){ ?>
            <p><a href="index.php?indice=1">croissant</a></p>
        <?php }

        else {
            ?> <p><a href="index.php">decroissant</a></p><?php
        }
    ?>
    
 <table border="1">
    <tr>
        <th>Department Number</th>
        <th>Department Name</th>
        <th>Manager actuel</th>
        <th>Nombre d'employés</th>
        <th>Action</th>
    </tr>
    <?php foreach ($departments as $line) {?>
        <tr>
            <td><a href="employees.php?dept_no=<?= urlencode($line['dept_no']) ?>"><?= $line['dept_no']?></a></td>
            <td><?=$line['dept_name']?></td>
            <td><?= $line['manager_name'] ?? '—' ?></td>
            <td><?= $line['nb_employees'] ?></td>
            <td><a href="dept_form.php?dept_no=<?= urlencode($line['dept_no']) ?>">Éditer</a></td>
        </tr>
    <?php } ?>
    </table>

    <a href="bbj"></a>

    </body>
</html>

 -->
