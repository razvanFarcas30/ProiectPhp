<?php
// conectare la baza de date database
include("Proiect_conectare.php");
// se verifica daca id a fost primit
if (isset($_GET['id_eveniment']) && is_numeric($_GET['id_eveniment']))
{
// preluam variabila 'id' din URL
$id_eveniment= $_GET['id_eveniment'];
// stergem inregistrarea cu ib=$id
if ($stmt = $mysqli->prepare("DELETE FROM evenimente WHERE id_eveniment =? LIMIT 1"))
{
$stmt->bind_param("i",$id_eveniment);
$stmt->execute();
$stmt->close();
}
else
{
echo "ERROR: Nu se poate executa delete.";
}
$mysqli->close();
echo "<div>Inregistrarea a fost stearsa!!!!</div>";
}
echo "<p><a href=\"Proiect_vizualizare.php\">Index</a></p>";
?>