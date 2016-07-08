<!DOCTYPE html>
<!--<?php
session_start();
$_SESSION["popUp"];
$_SESSION["nouveauUsager"] = false;
$_SESSION['usagerExiste'] = false;
?>-->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Accueil | Contact</title>
        <link rel="icon" type="image/png" href="../images/favic.png" />
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <script type="text/javascript" src="../js/PersonalInfo.js"></script>
    </head>
    <body>
        <div id="index">
            <img src="../images/favic.png"/>
            <span>CONTACT</span>
        </div>
        <div id="deplacable">
            <table>
                <span class="entet">Réseau social professionnel en ligne </span>
                <form action="validation.php" method="post" enctype="multipart/form-data" onsubmit="return validerChamps()">
                    <input type="hidden" name="TypeUsager" value="Ancien">
                    <tr>
                        <td><span class="intro">Adresse courriel:</span></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="email" class="input courriel" id="tdDesc"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="introMP"> Mot de passe:</span></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="motPasse" class="input"  id="tdDesc2" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Soumettre" class="input" id="boutSum" />
                        </td>
                    </tr>
                </form>
                <tr>
                    <td><a href="nouvUsager.php"><span class="nouvUt">Je suis un nouvel utilisateur:</span> <span class="nouvUt insc">M'inscrire</span> </a></td>
                </tr>
            </table>
        </div>
        <p>
            &copy; Contact 2010-2015
        </p>
    </body>
</html>

<?php
if ($_SESSION["popUp"]) {
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Vous devez vous inscrire.');";
    echo "
</script>";
}
$_SESSION["popUp"] = false;
?>