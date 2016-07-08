<!DOCTYPE html>

<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION["nouveauUsager"]) {
    include 'sauveDonnees.php';
}
$_SESSION["nouveauUsager"] = false;
?>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Mon compte | Contact</title>
        <link rel="icon" type="image/png" href="../images/favic.png" />
        <link rel="stylesheet" type="text/css" href="../css/monCompte.css">
        <script type="text/javascript"  src="jquery.js"></script>
        <script type="text/javascript" language="javascript">
            setTimeout(function () {
                window.location.reload();
            }, 15000);

            function addToFriend(obj) {
                $.get('traitement.php', {
                    ID: $(obj).attr('id')
                }, function (donneesReponse) {
                    $('#invites').append(donneesReponse);
                });
            }
        </script> 
    </head>
    <body>
        <img src="../images/favic.png" class="contact">
        <div class="entete">
        	Réseau social professionnel en ligne         
        </div>
        <div class="ent2">
            Mon compte
        </div>
        <div id="enveloppe">
            <div class="contenu">
                <div class="utilisateurCourant">
                    <img id="imageUtilisateur" src="<?php echo $_SESSION['fichierCopie'] ?>" alt="Photo" class="donnees">
                    <table class="infoUtilisateur">
                        <tr>
                            <td>Nom: </td>
                            <td><?php echo $_SESSION['leNom']; ?></td>
                        </tr>
                        <tr>
                            <td>Adresse: </td>
                            <td><?php echo $_SESSION['lAdresse']; ?></td>
                        </tr>
                        <tr>
                            <td>Formation: </td>
                            <td><?php echo $_SESSION["laFormation"]; ?></td>
                        </tr>                        
                        <tr>
                            <td>Intérêt 1: </td>
                            <td><?php echo $_SESSION["inter1"]; ?></td>
                        </tr>
                        <tr>
                            <td>Intérêt 2: </td>
                            <td><?php echo $_SESSION["inter2"]; ?></td>
                        </tr>
                        <tr>
                            <td>Intérêt 3: </td>
                            <td><?php echo $_SESSION["inter3"]; ?></td>
                        </tr>
                        <tr>
                            <td>Intérêt 4: </td>
                            <td><?php echo $_SESSION["inter4"]; ?></td>
                        </tr>
                        <tr>
                            <td>Profil: </td>
                            <td><?php echo $_SESSION["siPublic"]; ?></td>
                        </tr>
                        <tr>
                            <td>Courriel: </td>
                            <td><?php echo $_SESSION["leCourriel"]; ?></td>
                        </tr>
                    </table>
                    <div class="aDiv"></div> 
                    <a href="index.php">Retourner à la page d'accueil</a> 
                </div>                 
                <div class="invit">
                    Invitez les personnes <br/> 
                    qui partagent vos intérêts<br/>
                    faire partie de vos contacts
                </div>
                <div class="cache"></div>
                <div class="connivantsPotentielles">   

                    <?php
                    $interets = array($_SESSION["inter1"], $_SESSION["inter2"], $_SESSION["inter3"], $_SESSION["inter4"],);
                    $conn = mysql_connect('zeta2.labunix.uqam.ca', 'hd791183', 'pBzKUIWr');
                    mysql_select_db('bd_hd791183', $conn);
                    $sql = "SELECT PhotoUrl, Nom, Adresse, Interet1, Interet2, Interet3, Interet4, Courriel, MotPasse
                             			FROM connivents WHERE Public = 'public' ";
                    $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                    while ($row = mysql_fetch_array($req)) {
                        $break1 = true;
                        $interTable = array($row["Interet1"], $row["Interet2"], $row["Interet3"], $row["Interet4"]);
                        $email = array($row["Courriel"]);
                        foreach ($interTable as $i) {
                            foreach ($interets as $inter) {
                                if ($inter == $i && ($_SESSION['leNom'] != $row['Nom'] || $_SESSION['leMotPasse'] != $row['MotPasse']) && $break1) {
                                    echo "<img src=" . $row['PhotoUrl'] . " width='250' ></br>";
                                    echo $row['Nom'] . "</br>";
                                    $break1 = false;
                                }
                            }
                        }
                        if (!$break1) {
                            echo "<button class=\"Inviter\" id=" . $row['Courriel'] . "  onclick='addToFriend(this)' > Inviter </button></br></br>";
                        }
                    }
                    ?>

                </div>                
            </div>            
            <div class="cache2"></div>
            <div id="invites"> 
                <div class="mesContacts">Mes contacts</div>
                <div class="cache3"></div>

                <?php
                $sqlAmis = "SELECT Nom,PhotoURL FROM amis WHERE idAmis = '" . $_SESSION['currentId'] . "'";
                $reqAmis = mysql_query($sqlAmis) or die('Erreur SQL !<br>' . $sqlAmis . '<br>' . mysql_error());
                while ($row = mysql_fetch_array($reqAmis, MYSQL_ASSOC)) {
                    echo " <img src=\"" . $row['PhotoURL'] . "\" height=\"135\" width=\"135\"> " . "<br/>" . "{$row['Nom']}  <br> </br>";
                }
                mysql_close();
                ?>

            </div>
        </div>
        <p>
            &copy; Contact 2010-2015
        </p>
    </body>
</html>