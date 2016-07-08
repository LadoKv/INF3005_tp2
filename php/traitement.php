
<?php

if (!isset($_SESSION)) {
    session_start();
}
$conn = mysql_connect('zeta2.labunix.uqam.ca', 'hd791183', 'pBzKUIWr');
mysql_select_db('bd_hd791183', $conn);

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

$nouveauAmis = $_GET['ID'];

$sql = "SELECT Nom, Courriel, PhotoURL
        FROM connivents WHERE Courriel = '$nouveauAmis' ";
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$data = mysql_fetch_assoc($req);


$sqlAmisExiste = "SELECT Nom FROM amis WHERE Courriel = '$nouveauAmis' AND idAmis = '" . $_SESSION['currentId'] . "'";
$reqAmisExiste = mysql_query($sqlAmisExiste) or die('Erreur SQL !<br>' . $sqlAmisExiste . '<br>' . mysql_error());
$dataAmisExiste = mysql_fetch_assoc($reqAmisExiste);

if ($dataAmisExiste['Nom'] == "" || $dataAmisExiste['Nom'] == NULL) {
    $sqlInsertAmis = "INSERT INTO amis (idAmis,Nom, Courriel,PhotoURL)
VALUES ('" . $_SESSION['currentId'] . "','" . $data['Nom'] . "','" . $data['Courriel'] . "','" . $data['PhotoURL'] . "')";
    $res = mysql_query($sqlInsertAmis);
}
?>
    