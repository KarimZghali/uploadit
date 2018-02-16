<?php ?>
<div class="tilte-box"><?php echo $formatBox ?></div>

<div class ="img-box"><img src="./../resources/pub/<?php echo $picture; ?>" class="pictures"></div>
<div class="btn-manage">
    <a href="./../resources/pub/<?php echo $picture; ?>" download="<?php echo $picture; ?>" title="Télécharger">
        <div class="btn-mn glyphicon glyphicon-download"></div>
    </a>
    <a href="./../resources/pub/<?php echo $picture; ?>" target = "_blank" title="Agrandir">
        <div class="btn-mn glyphicon glyphicon-zoom-in"></div>
    </a>
    <a href="/uploadit/web/?bdc=W11911&media=allocine&sup=<?php echo $formatBox; ?>" title="Supprimer" onclick="return conf()">
        <div class="btn-mn glyphicon glyphicon-trash"></div>
    </a>

</div>