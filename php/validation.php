<?php

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION["leCourriel"] = $_POST["email"];
$_SESSION["leMotPasse"] = $_POST["motPasse"];
$courriel = $_SESSION["leCourriel"];
$motPasse = $_SESSION["leMotPasse"];
$_SESSION["popUp"] = false;

$conn = mysql_connect('zeta2.labunix.uqam.ca', 'hd791183', 'pBzKUIWr');
mysql_select_db('bd_hd791183', $conn);

$sql = "SELECT id,Nom,Adresse,PhotoURL,Formation,Interet1,Interet2,Interet3, Interet4, Public, Courriel, MotPasse 
          FROM connivents WHERE `Courriel` = '$courriel' AND `MotPasse` = '$motPasse'";
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

$data = mysql_fetch_assoc($req);

if ($data['Courriel'] == NULL) {
    $_SESSION["popUp"] = true;
    header('Location: index.php');
} else {
    echo "bonjour";
    $_SESSION["leNom"] = $data['Nom'];
    $_SESSION["lAdresse"] = $data['Adresse'];
    $_SESSION["fichierCopie"] = $data['PhotoURL'];
    $_SESSION["laFormation"] = $data['Formation'];
    $_SESSION["inter1"] = $data['Interet1'];
    $_SESSION["inter2"] = $data['Interet2'];
    $_SESSION["inter3"] = $data['Interet3'];
    $_SESSION["inter4"] = $data['Interet4'];
    $_SESSION["siPublic"] = $data['Public'];
    $_SESSION['currentId'] = $data['id'];
    header('Location: moncompte.php');
}
 

