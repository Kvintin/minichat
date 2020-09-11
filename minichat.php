<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minichat</title>
</head>
<body>
    <h1>Minichat</h1>
        <form method="post" action="minichat_post.php">
            <label for="pseudo">Pseudo : </label><input type="text" name='pseudo' id='pseudo'><br />
            <label for="message">Message : </label><input type="text" name="message" id="message"><br />
            <input type="submit" value="Envoyer">
        </form>

        <a href="minichat.php">Rafrâichir</a>


        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8;port=3307', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $req = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 5');

        while ($donnees = $req->fetch()) {
        ?>
            <p>
                <strong><?php echo htmlspecialchars($donnees['pseudo']); ?></strong> : <?php echo htmlspecialchars($donnees['message']); ?>
            </p>
        <?php
        }

        $req->closeCursor();
        ?>

</body>
</html>