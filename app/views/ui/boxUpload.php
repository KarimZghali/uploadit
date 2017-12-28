<?php ?>

<div class="tilte-box"><?php echo $formatBox ?></div>
<div class ="no-pictres">Aucun(e) <?php echo $formatBox ?> uploadé(e) pour le moment</div>
<div class="btn-ts">
    <a href="/uploadit/web/?bdc=<?php echo $_GET["bdc"]; ?>&media=<?php echo $_GET["media"]; ?>&format=<?php echo $formatBox; ?>">Voir les spécifications techniques</a>
</div>
<?php include ('formUpload.php');?>