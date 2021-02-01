<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord ampoules</title>
</head>
<?php           //CONNEXION A LA BASE DE DONNEES
try {
    $bdd = new PDO('mysql:host=localhost;dbname=dashboard', 'root');
} catch (PDOException $e) {
    print "Erreur: " . $e->getMessage() . "<br/>";
    die();
}
?>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Gestion ampoules</a></li>
                <li><a href="historique.php">Historique</a></li>
                <li><a href="login.php">Deconnexion</a></li>
            </ul>
        </nav>
    </header>

    <h1>HISTORIQUE</h1>
    <div>
        <table>
            <tr>
                <th>Date</th>
                <th>Position</th>
                <th>Etage</th>
                <th>Prix</th>
            </tr>
            <?php
            $req1 = $bdd->query("SELECT `id`, `date`, `position`, `etage`, `prix` FROM `ampoules` WHERE 1");
            foreach ($req1 as $donnees) :
            ?>
                <tr>
                    <th><?php echo $donnees['date']; ?></th>
                    <th><?php echo $donnees['position']; ?></th>
                    <th><?php echo $donnees['etage']; ?></th>
                    <th><?php echo $donnees['prix']; ?></th>

                    <th><input type="submit" value="Supprimer" name="delete"></th>
                    <th><button><a href="index.php">Editer</a></th></button>
                </tr>
                <?php
                if (isset($_POST['delete'])) {
                    $id = $donnees['id'];
                    $del = $bdd->query("DELETE FROM ampoules where= 'id'=$id");
                    $del->execute();
                } ?>
            <?php endforeach ?>
        </table>
    </div>

    <?php           //CONNEXION A LA BASE DE DONNEES
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=dashboard', 'root');
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>

</body>

</html>