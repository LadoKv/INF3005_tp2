<?php

if (!isset($_SESSION)) {
    session_start();
}
$_SESSION['usagerExiste'] = false;

if (!empty($_POST)) {
    $_SESSION['leNom'] = addslashes($_POST['nom']);
    $_SESSION["lAdresse"] = addslashes($_POST["adresse"]);
    $_SESSION["laFormation"] = addslashes($_POST["formation"]);
    $_SESSION["inter1"] = $_POST["interet"][0];
    $_SESSION["inter2"] = $_POST["interet"][1];
    $_SESSION["inter3"] = $_POST["interet"][2];
    $_SESSION["inter4"] = $_POST["interet"][3];
    $_SESSION["siPublic"] = $_POST["public"];
    $_SESSION["leCourriel"] = $_POST["courriel"];
    $_SESSION["leMotPasse"] = $_POST["motPasse"];
}

$conn = mysql_connect('zeta2.labunix.uqam.ca', 'hd791183', 'pBzKUIWr');
mysql_select_db('bd_hd791183', $conn);

$sqlEmailExists = "SELECT Courriel FROM connivents WHERE Courriel = '" . $_SESSION["leCourriel"] . "' ";
$reqEmailExists = mysql_query($sqlEmailExists) or die('Erreur SQL !<br>' . $sqlEmailExists . '<br>' . mysql_error());
$data = mysql_fetch_assoc($reqEmailExists);
if (!is_null($data["Courriel"])) {
    $_SESSION['usagerExiste'] = true;
    header('Location: nouvUsager.php');
} else {

    if (!empty($_FILES)) {

        $fichierCharge = $_FILES['photo']['tmp_name'];
        $fichierCopie = 'photos/' . $_FILES['photo']['name'];
        if (!file_exists($fichierCopie)) {
            move_uploaded_file($fichierCharge, $fichierCopie);
        }

        $_SESSION['fichierCopie'] = $fichierCopie;
    }

    if (!$conn) {
        die("Connection failed: " . mysql_connect_error());
    }

    $req = "INSERT INTO connivents (Nom,Adresse,PhotoURL,Formation,Interet1,Interet2,Interet3, Interet4, Public, Courriel, MotPasse)
VALUES ('" . $_SESSION["leNom"] . "','" . $_SESSION["lAdresse"] . "','" . $fichierCopie . "','" . $_SESSION["laFormation"] . "','" . $_SESSION["inter1"] . "','" . $_SESSION["inter2"] . "','" . $_SESSION["inter3"] . "','" . $_SESSION["inter4"] . "','" . $_SESSION["siPublic"] . "','" . $_SESSION["leCourriel"] . "','" . $_SESSION["leMotPasse"] . "')";
    $res = mysql_query($req) or die('Erreur SQL !<br>' . $req . '<br>' . mysql_error());
    $_SESSION['currentId'] = mysql_insert_id();
}
mysql_close($conn);
?>
