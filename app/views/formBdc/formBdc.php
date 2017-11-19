<?php ?>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form method="get" action="http://localhost/uploadit/web/">
    <label for="bdc">Bon de commande</label>
    <input type="text" name="bdc" placeholder="Entrez ici votre numéro de bon de commande">
    <br>
Quelle offre avez-vous souscite ?
    <input type="radio" id="allocine" name="media" value="allocine">
    <label for="allocine">Allociné</label>

    <input type="radio" id="admoove" name="media" value="admoove">
    <label for="admoove">AdMoove</label>

    <input type="radio" id="nrj" name="media" value="nrj">
    <label for="nrj">Site(s) groupe NRJ</label>
    <br>
    <input type="submit" value="Envoyer"/>

</form>
</body>
</html>