<?php ?>

<form method="post" enctype="multipart/form-data" action="/uploadit/web/?bdc=<?php echo $_GET["bdc"]; ?>&media=<?php echo $_GET["media"]; ?>" class="form-file flex">
    <input type='hidden' name='format' value='<?php echo $formatBox; ?>'>
    <input type="file" name="file-<?php echo $formatBox; ?>" required>
    <button type="submit" name="upload" value="">Envoyer</button>
</form>