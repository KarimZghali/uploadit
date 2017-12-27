<?php

include(__DIR__."/../header.php");

?>

<body>

    <div id="container" class="row container-fluid">

        <div id="info-area" class="col-md-3">

            <div id="logo">
                <img src="./../resources/new-logo.png" alt="logo Upload'it" id="img-logo">
            </div>

            <div id="bdc" class="shadow">
                <div><?php echo $campagne->getNumberBdcCampagne() ?></div>
                <div id="mini">(cliquer pour changer de campagne)</div>
            </div>

<!--            <div id="change-bdc" class="btn2">-->
<!--                Changer de campagne-->
<!--            </div>-->

            <div id="form">
                <form class="form-horizontal">
                    <fieldset>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="selectbasic">Commercial</label>
                            <div class="col-md-8">
                                <select id="selectbasic" name="selectbasic" class="form-control">
                                    <option value="1">Option one</option>
                                    <option value="2">Option two</option>
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="textinput">Email client</label>
                            <div class="col-md-8">
                                <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">

                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <button id="singlebutton" name="btn" class="btn2 ">Valider</button>
                            </div>
                        </div>

                    </fieldset>
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
                <div class="txt-tech-spec">Zone de texte à respecter : </div>
                <div class="txt-tech-spec">Format : </div>
                <div class="txt-tech-spec">Dimensions : </div>
                <div class="txt-tech-spec">Poids max. : </div>
                <div class="txt-tech-spec">Compatible avec : </div>
            </div>

            <div id="customer-reminder">

                <button class="btn2">Envoyer un rappel au client</button>

            </div>

            <div id="help">

                <button class="btn2">Besoin d'aide ?</button>

            </div>

        </div>

        <div id="management-area" class="col-md-9">

            <div id="media-select" class="col-md-12">

                <div id="btn-allocine" class="btn-media col-md-3">Allociné</div>
                <div id="btn-admoove" class="btn-media col-md-3 col-md-offset-1">AdMoove</div>
                <div id="btn-nrj" class="btn-media col-md-3 col-md-offset-1">NRJ</div>

            </div >

            <div class="col-md-12">

                <div id="logo" class="col-md-3"><img src="./../resources/logo allocine.jpg" alt="logo Upload'it" id="img-logo"></div>

                <div id="date-select" class="col-md-9">
                    <div id="btn-date1" class="btn-date col-md-2">Période 1</div>
                    <div id="btn-date2" class="btn-date col-md-2">Période 2</div>
                    <div id="btn-date3" class="btn-date col-md-2">Période 3</div>
                    <div id="btn-date4" class="btn-date col-md-2">Période 4</div>

                </div>

            </div>

            <div id="date-edit" class='col-md-12'>

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

            <div id="pictures-manage" class='col-md-12'>

                <div id="habillage-pc" class='box col-md-6'>hohéééééé</div>

                <div id="habillage-mobile"class='box col-md-6'></div>

                <div id="habillage-tablette"class='box col-md-6'></div>

                <div id="habillage-dp"class='box box col-md-6'></div>

            </div>



        </div>

    </div>


</body>
