<?php ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Upload'it - ADMIN</title>
</head>

<body>

    <div>
        <form method="post" action="./?">

            <label for="name">Nom du format</label>
            <input type="text" id="name" name="name"/><br/><br/>

            <label for="weight">Poids max du format</label>
            <input type="number" id="weight" name="weight"/><br/><br/>

            <label for="height">Hauteur du format</label>
            <input type="number" id="height" name="height"/><br/><br/>

            <label for="width">Largeur du format</label>
            <input type="number" id="width" name="width"/><br/><br/>

            <input type="submit" value="Envoyer">

        </form>

    </div>



</body>



</html>
