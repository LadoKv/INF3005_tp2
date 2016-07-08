<!DOCTYPE html>

<?php
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION["nouveauUsager"] = true;
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Nouveau usager | Contact</title>
        <link rel="icon" type="image/png" href="../images/favic.png" />
        <link rel="stylesheet" type="text/css" href="../css/nouvUsager.css">
        <script type="text/javascript"  src="jquery.js"></script>
        <script type="text/javascript" src="../js/PersonalInfo.js"></script>
    </head>
    <body>
        
        <?php
        if ($_SESSION['usagerExiste']) {
            $_SESSION['usagerExiste'] = false;
            echo "<script type=\"text/javascript\">";
            echo "alert('Ce courriel existe déjà. Veuillez compléter le formulaire de nouveau.')";
            echo "</script>";
        }
        ?>

        <img src="../images/favic.png" class="contact">
        <div class="entete">
        	Réseau social professionnel en ligne 
        </div>
        <div class="ent2">
            Inscription
        </div>
        <div class="contenu">
            <div class="divForm">
                <img src="../images/pense-bete.png" class="pBete">
                <span class="inf">Fournis-nous
                    <br/>
                    tes informations
                </span>
                <form action="moncompte.php" method="post" enctype="multipart/form-data" onsubmit="return validerChampsNUsager()">
                    <input type="hidden" name="TypeUsager" value="Nouveau">
                    <table class="tabMarges">
                        <tr>
                            <td><span class="monSpan">Nom</span></td>
                            <td>
                                <input type="text" name="nom" class="inpRouge" id="leNom"/>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Adresse</span></td>
                            <td>
                                <input type="text" name="adresse" class="inpRouge" id="lAdresse"/>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Une photo</span></td>
                            <td>
                                <input type="file" name="photo" class="inpRouge"/>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Formation</span></td>
                            <td>
                                <input type="text" name="formation" class="inpRouge"/>
                            </td>
                        </tr>
                        <img src="../images/pense-bete.png" class="pBete2">
                        <span class="inf2"> Choisis
                            <br/>
                            tes 4 intérêts
                            <br/>
                            professionnels</span>
                    </table>
                    <hr class="hr1" />
                    <table class="tabMarges2">
                        <tr>
                            <td><span class="monSpan">Actuariat</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Actuariat" id="Act">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Anglais</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Anglais" id="Ang">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Architecture</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Architecture" id="Arc">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Chiropratique</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Chiropratique" id="Chi">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Design industriel</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Design industriel" id="Des">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Génétique</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Génétique" id="Gen">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Ingénierie</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Ingénierie" id="Ing">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Pédagogie</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Pédagogie" id="Ped">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Psychologie</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Psychologie" id="Psy">
                            </td>
                        </tr>
                        <tr>
                            <td><span class="monSpan">Service social</span></td>
                            <td>
                                <input type="checkbox" name="interet[]" value="Service social" id="Ser">
                            </td>
                        </tr>
                        <img src="../images/pense-bete.png" class="pBete3">

                    </table>
                    <hr class="hr2" />
                    <span class="inf3"> Choisi<br/>ton type<br/>de profil<br/></span>

                    <table class="tabMarges3">

                        <tr colspan=2>
                            <td><span class="publ">Public</span>
                                <input type="radio" name="public" value="public" class="pub" id="Public">
                                <span class="publ">Privé</span>
                                <input type="radio" name="public" value="prive" class="pub" id="Prive">
                            </td>

                        </tr>
                        <img src="../images/pense-bete.png" class="pBete4">
                    </table>
                    <hr class="hr3" />
                    <span class="inf4">Courriel<br/>et mot de passe<br/></span>
                    <table class="tabMarges4">					
                        <tr>
                            <td class="champTable"><span class="monSpan" >Courriel </span></td>
                            <td class="champTable">
                                <input type="text" name="courriel" class="inpRouge" id="tdDesc"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="champTable"><span class="monSpan">Mot de passe </span></td>
                            <td class="champTable">
                                <input type="password" name="motPasse" class="inpRouge" id="tdDesc2"/>
                            </td>
                        </tr>
                    </table>
                    <hr class="hr4" />
                    <div id="divEnvBoutton">
                        <input type="submit" value="Soumettre" class="boutton"/>
                    </div>
                </form>
            </div>
        </div>
        <p>
            &copy; Contact 2010-2015
        </p>
    </body>
</html>