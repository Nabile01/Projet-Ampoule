<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connection</title>
</head>

<body>
    <h3>Espace administrateur</h3>
    <form action="" method="post">
        <div>
            <label for="identifiant">Identifiant : </label>
            <input type="text" id="identifiant" name="identifiant" required>
        </div>
        <div>
            <label for="mdp">Mot de passe : </label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <div id="submit">
            <input type="submit" value="Connexion">
        </div>
    </form> 
    <?php

if (isset($_POST['identifiant'])) {
    if ($_POST['mdp'] == 'admin01' AND $_POST['identifiant'] == 'admin') {
header('Location: index.php');
}
else {
echo "Indentifiants incorrects";
}
}

?>
</body>

</html>