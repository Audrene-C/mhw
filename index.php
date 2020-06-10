<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestiaire de MHW : Iceborne</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <?php 
        include_once 'partials/connection.php';
    ?>

    <div class="navbar">
        <h1>Faiblesses de chaque monstre</h1>
    </div>

    <div class="container-fluid">

        <?php 
            for ($i=0; $i < 7; $i++) {
                $results = [];
                if($i == 0) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Wywerne de terre" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Wywernes de terre</h2> <?php
                } elseif($i == 1) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Wywerne rapace" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Wywernes rapace</h2> <?php
                } elseif($i == 2) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Wywerne à crocs" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Wywernes à crocs</h2> <?php
                } elseif($i == 3) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Wywerne aquatique" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Wywernes aquatiques</h2> <?php
                } elseif($i == 4) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Wywerne volante" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Wywernes volantes</h2> <?php
                } elseif($i == 5) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Dragon ancien" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Dragons anciens</h2> <?php
                } elseif($i == 6) {
                    $req = $database->query('SELECT * FROM bestiaire WHERE bestiaire.type = "Autre grand monstre" ORDER BY nom');
                    $results = $req->fetchAll(PDO::FETCH_ASSOC);?>
                    <h2>Autres grands monstres</h2> <?php
                }
                          

                $numOfCols = 3;
                $rowCount = 0;
                foreach ($results as $result){
                if($rowCount % $numOfCols == 0) { ?> <div class="row"> <?php } 
                    $rowCount++; ?>  
                        <div class="col-12 col-md-6 col-lg-4">
                            <h3><?php echo ($result['nom']); ?></h3>
                            <img class="img-circle" src="img/<?php echo (strtolower($result['image'])); ?>" alt="<?php echo ($result['nom']); ?>" width="140" height="140">
                            <p>
                                Feu : <?php echo ($result['feu']); ?> Poison : <?php echo ($result['poison']); ?></br>
                                Eau : <?php echo ($result['eau']); ?> Sommeil : <?php echo ($result['sommeil']); ?></br>
                                Foudre : <?php echo ($result['foudre']); ?> Paralysie : <?php echo ($result['paralysie']); ?></br>
                                Glace : <?php echo ($result['glace']); ?> Explosion : <?php echo ($result['explosion']); ?></br>
                                Dragon : <?php echo ($result['dragon']); ?> Etourdissement : <?php echo ($result['etourdissement']); ?>
                            </p>
                        </div>
                <?php
                    if($rowCount % $numOfCols == 0 || $rowCount == count($results)) { ?> </div> <?php } 
                }
            }

        ?>            

    </div>
    
</body>
</html>