<?php // connectare bazadedate
include("Proiect_conectare.php");
//Modificare datelor
// se preia id din pagina vizualizare
$error='';
if (!empty($_POST['id_eveniment']))
{ if (isset($_POST['submit']))
{ // verificam daca id-ul din URL este unul valid
if (is_numeric($_POST['id_eveniment']))
{ // preluam variabilele din URL/form
$id_eveniment = htmlentities($_POST['id_eveniment'], ENT_QUOTES);
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

{ // daca sunt goale afisam mesaj de eroare
echo "<div> ERROR: Completati campurile obligatorii!</div>";
}else
{ // daca nu sunt erori se face update name, code, image, price, descriere, categorie
                if ($stmt = $mysqli->prepare("UPDATE evenimente SET nume=?, descriere=?, data=?, ora=?, loc=?, pret=?, organizator=?, imagine=?, tip_eveniment=?, durata=?, locuri_disponibile=?, locuri_rezervate=?, id_categorie=? WHERE id_eveniment=?")) {
                    $stmt->bind_param("sssssssssissii", $nume, $descriere, $data, $ora, $loc, $pret, $organizator, $imagine, $tip_eveniment, $durata, $locuri_disponibile, $locuri_rezervate, $id_categorie, $id_eveniment);
                    $stmt->execute();
                    $stmt->close();
 }// mesaj de eroare in caz ca nu se poate face update
else
{echo "ERROR: nu se poate executa update.";}
}
}
// daca variabila 'id' nu este valida, afisam mesaj de eroare
else
{echo "id incorect!";} }}?>
<html> <head><title> <?php if ($_GET['id_eveniment'] != '') { echo "Modificare inregistrare"; }?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/></head>
<body>
<h1><?php if ($_GET['id_eveniment'] != '') { echo "Modificare Inregistrare"; }?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
<div>
<?php if ($_GET['id_eveniment'] != '') { ?>
<input type="hidden" name="id_eveniment" value="<?php echo $_GET['id_eveniment'];?>" />
<p>ID: <?php echo $_GET['id_eveniment'];
if ($result = $mysqli->query("SELECT * FROM evenimente where id_eveniment='".$_GET['id_eveniment']."'"))
{
if ($result->num_rows > 0)
{ $row = $result->fetch_object();

?>

</p>

<strong>Nume: </strong> <input type="text" name="nume" value="<?php echo$row->nume;
?>"/><br/>
<strong>Descriere: </strong> <input type="text" name="descriere" value="<?php echo$row->descriere;
?>"/><br/>
<strong>Data: </strong> <input type="text" name="data" value="<?php echo$row->data;
?>"/><br/>
<strong>Ora: </strong> <input type="text" name="ora" value="<?php echo$row->ora;
?>"/><br/>
<strong>Loc: </strong> <input type="text" name="loc" value="<?php echo$row->loc;
?>"/><br/>
<strong>Pret: </strong> <input type="text" name="pret" value="<?php echo$row->pret;
?>"/><br/>
<strong>Organizator: </strong> <input type="text" name="organizator" value="<?php echo$row->organizator;
?>"/><br/>
<strong>Imagine: </strong> <input type="text" name="imagine" value="<?php echo$row->imagine;
?>"/><br/>
<strong>Tip Eveniment: </strong> <input type="text" name="tip_eveniment" value="<?php echo$row->tip_eveniment;
?>"/><br/>
<strong>Durata: </strong> <input type="text" name="durata" value="<?php echo$row->durata;
?>"/><br/>
<strong>Locuri Disponibile: </strong> <input type="text" name="locuri_disponibile" value="<?php echo$row->locuri_disponibile;
?>"/><br/>
<strong>Locuri Rezervate: </strong> <input type="text" name="locuri_rezervate" value="<?php echo$row->locuri_rezervate;
?>"/><br/>
<strong>Id Categorie: </strong> <input type="text" name="id_categorie" value="<?php echo$row->id_categorie;}}}
?>"/><br/>
<br/>

<input type="submit" name="submit" value="Submit" />
<a href="Proiect_vizualizare.php">Index</a>
</div></form></body> </html>