<?php

include(__DIR__."/../header.php");

?>



<body>

    <div id="container" class="">

        <div id="info-area" class="shadow-box">

            <div id="logo">
                <img src="./../resources/new-logo.png" alt="logo Upload'it" id="img-logo">
            </div>

            <div id="bdc" class="shadow">
                <div><?php echo $model->getBdc() ?></div>
                <div id="mini">(cliquer pour changer de campagne)</div>
            </div>

            <div id="form-info">
                <form class="">
                        <div class="flex">
                            <label class="" for="selectbasic">Commercial</label>
                            <div class="">
                                <select id="selectbasic" name="selectbasic" class="">
                                    <option value="1">Option one</option>
                                    <option value="2">Option two</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="flex form-info">
                            <label class="" for="textinput">Email client</label>
                            <div class="">
                                <input id="textinput" name="textinput" type="text" placeholder="" class="" required="">

                            </div>
                        </div>

                        <!-- Button -->
                            <div class="valid-info">
                                <button id="" name="btn" class="btn2 ">Valider</button>
                            </div>
                </form>
            </div>
            <div id="technical-specifications" class="shadow">
                <div id="title">Specifications Techniques</div>
                <div class="txt-tech-spec">Nom du format : Habillage PC</div>
                <div class="txt-tech-spec">
                    <div>Exemple :</div>
                    <div><img  src="./../resources/habillage-PC.jpg" class="img"></div>
                    <div>Télécharger template</div>
                </div>
                <div class="txt-tech-spec">Zone de texte à respecter : <?php echo $model->getTxtZone(); ?> </div>
                <div class="txt-tech-spec">Format : <?php echo $model->getGif();  ?>  </div>
                <div class="txt-tech-spec">Dimensions : <?php echo $model->getHeight()."x".$model->getWidth()." (HxL)"; ?></div>
                <div class="txt-tech-spec">Poids max. : <?php echo $model->getWeight(); ?> Ko</div>
                <div class="txt-tech-spec">Compatible avec : tablette</div>
            </div>

            <div id="customer-reminder">

                <button class="btn2">Envoyer un rappel au client</button>

            </div>

            <div id="help">

                <button class="btn2">Besoin d'aide ?</button>

            </div>

        </div>

        <div id="management-area" class="">

            <div id="media-select" class="flex">

                <div id="btn-allocine" class="btn-media ">Allociné</div>
                <div id="btn-admoove" class="btn-media ">AdMoove</div>
                <div id="btn-nrj" class="btn-media">NRJ</div>

            </div >

            <div class="flex">

                <div id="logo" class=""><img src="./../resources/logo allocine.jpg" alt="logo Upload'it" id="img-logo"></div>

                <div id="date-select" class="flex">
                    <div id="btn-date1" class="btn-date ">Période 1</div>
                    <div id="btn-date2" class="btn-date ">Période 2</div>
                    <div id="btn-date3" class="btn-date ">Période 3</div>
                    <div id="btn-date4" class="btn-date ">Période 4</div>

                </div>

            </div>

            <div id="date-edit" class=''>

                <form method="get" action="" class=''>


                    <label class="align test" for="textinput">Periode 1 du</label>
                    <input id="textinput" name="textinput" type="date" placeholder="" class="align" required="">
                    <label class="align" for="textinput">au</label>

                    <input id="textinput" name="textinput" type="date" placeholder="" class="align" required="">

                    <div id="btn-date" class="align">

                        <button class="btn-valid-date">Valider</button>

                    </div>

                </form>

            </div>

            <div id="pictures-manage" class=''>

                <div class="col-box">

                    <div id="habillage-pc" class='box shadow-box'>

                        <div class="tilte-box">Habillage PC</div>
                        <div class ="no-pictres">Aucun habillage PC uploadé pour le moment</div>
                        <div class="btn-ts">Voir les spécifications techniques</div>
                        <form method="get" action="" class=" form-file flex">

                            <input type="file" name="file">
                            <button type="submit" value="">Envoyer</button>

                        </form>
                    </div>

                    <div id="habillage-mobile"class='box shadow-box'></div>

                </div>

                <div class="col-box">

                    <div id="habillage-tablette"class='box shadow-box'>

                        <div class="tilte-box">Habillage tablette</div>
                        <div class ="img-box"><img src="./../resources/<?php echo $model->getHabillageTabletteVague1();?>" class="pictures"></div>
                        <div class="btn-manage">
                            <div class="btn-mn glyphicon glyphicon-download"></div>
                            <div class="btn-mn glyphicon glyphicon-zoom-in"></div>
                            <div class="btn-mn glyphicon glyphicon-trash"></div>

                        </div>

                    </div>

                    <div id="habillage-dp"class='box shadow-box'></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
