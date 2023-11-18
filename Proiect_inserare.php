<?php
include("Proiect_conectare.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular

$nume = htmlentities($_POST['nume'], ENT_QUOTES);
$descriere = htmlentities($_POST['descriere'], ENT_QUOTES);
$data = htmlentities($_POST['data'], ENT_QUOTES);
$ora = htmlentities($_POST['ora'], ENT_QUOTES);
$loc = htmlentities($_POST['loc'], ENT_QUOTES);
$pret = htmlentities($_POST['pret'], ENT_QUOTES);
$organizator = htmlentities($_POST['organizator'], ENT_QUOTES);
$imagine = htmlentities($_POST['imagine'], ENT_QUOTES);
$tip_eveniment = htmlentities($_POST['tip_eveniment'], ENT_QUOTES);
$durata = htmlentities($_POST['durata'], ENT_QUOTES);
$locuri_disponibile = htmlentities($_POST['locuri_disponibile'], ENT_QUOTES);
$locuri_rezervate = htmlentities($_POST['locuri_rezervate'], ENT_QUOTES);
$id_categorie = htmlentities($_POST['id_categorie'], ENT_QUOTES);
if ($nume == ''  || $descriere == '' || $data == '' || $ora == '' || $loc == '' || $pret == '' || $organizator == '' || $imagine == '' || $tip_eveniment == '' || $durata == '' || $locuri_disponibile == '' || $locuri_rezervate == '' || $id_categorie == '') 
{
    // daca sunt goale se afiseaza un mesaj
    $error = 'ERROR: Campuri goale!';
} else {
    // insert
    if ($stmt = $mysqli->prepare("INSERT into evenimente ( nume, descriere, data, ora, loc, pret, organizator, imagine, tip_eveniment, durata, locuri_disponibile, locuri_rezervate, id_categorie) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("sssssssssissi", $nume, $descriere, $data, $ora, $loc, $pret, $organizator, $imagine, $tip_eveniment, $durata, $locuri_disponibile, $locuri_rezervate, $id_categorie);
        $stmt->execute();
        $stmt->close();
    } else {
        // eroare le inserare
        echo "ERROR: Nu se poate executa insert.";
    }
}}

// verificam daca sunt completate
// se inchide conexiune mysqli
$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head> <title><?php echo "Inserare inregistrare"; ?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head> <body>
<h1><?php echo "Inserare inregistrare"; ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
<div>
<strong>Nume: </strong> <input type="text" name="nume" value=""/><br/>
<strong>Descriere: </strong> <input type="text" name="descriere" value=""/><br/>
<strong>Data: </strong> <input type="text" name="data" value=""/><br/>
<strong>Ora: </strong> <input type="text" name="ora" value=""/><br/>
<strong>Loc: </strong> <input type="text" name="loc" value=""/><br/>
<strong>Pret: </strong> <input type="text" name="pret" value=""/><br/>
<strong>Organizator: </strong> <input type="text" name="organizator" value=""/><br/>
<strong>Imagine: </strong> <input type="text" name="imagine" value=""/><br/>
<strong>Tip Eveniment: </strong> <input type="text" name="tip_eveniment" value=""/><br/>
<strong>Durata: </strong> <input type="text" name="durata" value=""/><br/>
<strong>Locuri Disponibile: </strong> <input type="text" name="locuri_disponibile" value=""/><br/>
<strong>Locuri Rezervate: </strong> <input type="text" name="locuri_rezervate" value=""/><br/>
<strong>Id Categorie: </strong> <input type="text" name="id_categorie" value=""/><br/>
<br/>
<input type="submit" name="submit" value="Submit" />
<a href="Proiect_vizualizare.php">Index</a>
</div></form></body></html>