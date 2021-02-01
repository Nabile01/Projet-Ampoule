<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord ampoules</title>
</head>

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

    <?php           //CONNEXION A LA BASE DE DONNEES
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=dashboard', 'root');
    } catch (PDOException $e) {
        print "Erreur: " . $e->getMessage() . "<br/>";
        die();
    }
    ?>

    <form method="POST">
        <div>
            <label for="date1">Date de changement :</label>
            <input type="date" id="date1" name="date1" required>
        </div>

        <div>
            <label for="etage">Etage :</label>
            <select name="etage" id="etage" required>
                <option value="Etage 1">Etage 1</option>
                <option value="Etage 2">Etage 2</option>
                <option value="Etage 3">Etage 3</option>
                <option value="Etage 4">Etage 4</option>
                <option value="Etage 5">Etage 5</option>
                <option value="Etage 6">Etage 6</option>
                <option value="Etage 7">Etage 7</option>
                <option value="Etage 8">Etage 8</option>
                <option value="Etage 9">Etage 9</option>
                <option value="Etage 10">Etage 10</option>
                <option value="Etage 11">Etage 11</option>
            </select>
        </div>

        <div>
            <label for="position">Position :</label>
            <select name="position" id="position" required>
                <option value="Droit">Côté droit</option>
                <option value="Gauche">Côté gauche</option>
                <option value="Fond">Au fond</option>
            </select>
        </div>

        <div>
            <label for="price">Prix de l'ampoule :</label>
            <input type="text" name="price" id="price" required>
        </div>

        <div>
            <input type="submit" value="Valider" id="submit" name="submit">
        </div>
    </form>
</body>

</html>

<?php

if (isset($_POST['date1'])) {
    $date = ($_POST["date1"]);
    $position = ($_POST["position"]);
    $etage = ($_POST["etage"]);
    $price = ($_POST["price"]);



    if (!empty($date) && !empty($etage) && !empty($position) && !empty($price)) {
        $insertion = $bdd->prepare("INSERT INTO `ampoules`(`date`, `position`, `etage`, `prix`) VALUES (:date1, :position, :etage, :price)");
        $insertion->bindParam(':date1', $date);
        $insertion->bindParam(':position', $position);
        $insertion->bindParam(':etage', $etage);
        $insertion->bindParam(':price', $price);
        $insertion->execute();
    } else {
        echo 'Erreur';
    }
}

?>