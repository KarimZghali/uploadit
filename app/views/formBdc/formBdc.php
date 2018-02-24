<?php
session_start();
$token = uniqid(rand(), true);
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();
include(__DIR__."/../header.php");

?>

<body>

   <div id="container-form">
        <div id="logo-form"><img src="./../resources/logo-nrj.jpg"/></div>
       <?php if (isset($failAuth) && $failAuth) { ?>
           <div class="alert">Votre numéro de BDC ne correspond à aucune campagne
               et/ou vous n'avez pas selectionné un des trois médias.</div>
       <?php }else {  ?>
           <div id="txt">Bienvenue sur votre interface Uplod'it ! Ici vous allez pouvoir uploader vos créations graphiques pour la diffusion sur le média de votre choix.</div>
       <?php } ?>


        <div id="form-block">
            <form method="get" action="">

                <div id="bdc-block" class="form-group">
                    <label for="bdc">Votre numéro de bon de commande :</label>
                    <input type="text" class="form-control" name="bdc" id="bdc-form" aria-describedby="bdc" placeholder="Example : W12345" required>
                    <small id="bdcHelp" class="form-text text-muted">Si vous ne parvenez pas à trouver votre numéro de bon de commande, vous pouvez demander de l'aide <a class="linkHelp" href="">ici</a>.</small>
                </div>

               <div id="select-media"class="form-group">
                    A quelle offre avez-vous souscrit ?<br/>
                   <small id="mediaHelp" class="form-text text-muted">Sélectionnez une des trois offres ci-dessous ou demandez de l'aide <a class="linkHelp" href="">ici</a>.</small><br>


                   <label class="lbl">
                       <input type="radio" id="allocine" name="media" value="allocine">
                       <img src="./../resources/logo allocine.jpg"/>
                   </label>

                   <label class="lbl">
                       <input type="radio" id="admoove" name="media" value="admoove">
                       <img src="./../resources/logo admoove.jpg"/>
                   </label>

                   <label class="lbl">
                       <input type="radio" id="nrj" name="media" value="nrj">
                       <img src="./../resources/menu nrj.png"/>
                   </label>
               </div>

                <input type="hidden" name="token" id="token" value="<?php echo $token; ?>"/>

                <div class="valid-form btn-media">
                    <button id="" name="btn" class="btn-valid">Valider</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>