<?php ?>

    <div class="tilte-box"><?php echo $formatBox ?></div>
    <div class ="error-upload"><strong>ECHEC DE L'UPLOAD</strong><br/><?php echo $this->uploadError ?></div>
    <div class="btn-ts">
        <a href="/uploadit/web/?bdc=<?php echo $_GET["bdc"]; ?>&media=<?php echo $_GET["media"]; ?>&format=<?php echo $formatBox; ?>">Voir les spécifications techniques</a>
    </div>
<?php include ('formUpload.php');?>