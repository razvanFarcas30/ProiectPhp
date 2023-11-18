
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Vizualizare Inregistrari</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Inregistrarile din tabela datepers</h1>
<p><b>Toate inregistrarile din datepers</b</p>

<?php 
// connectare bazadedate
 include("Proiect_conectare.php");
// se preiau inregistrarile din baza de date
if ($result = $mysqli->query("SELECT * FROM evenimente ORDER BY id_eveniment "))
{ // Afisare inregistrari pe ecran
if ($result->num_rows > 0)
{
// afisarea inregistrarilor intr-o table
echo "<table border='1' cellpadding='10'>";
// antetul tabelului
echo "<tr><th>id_eveniment</th><th>nume</th><th>descriere</th><th>data</th><th>ora</th><th>loc</th><th>pret</th><th>organizator</th><th>imagine</th><th>tip_eveniment</th><th>durata</th><th>locuri_disponibile</th><th>locuri_rezervate</th><th>id_categorie</th></tr>";

while ($row = $result->fetch_object())
{
// definirea unei linii pt fiecare inregistrare
echo "<tr>";
echo "<td>" . $row->id_eveniment . "</td>";
echo "<td>" . $row->nume . "</td>";
echo "<td>" . $row->descriere . "</td>";
echo "<td>" . $row->data . "</td>";
echo "<td>" . $row->ora . "</td>";
echo "<td>" . $row->loc . "</td>";
echo "<td>" . $row->pret . "</td>";
echo "<td>" . $row->organizator . "</td>";
echo "<td>" . $row->imagine . "</td>";
echo "<td>" . $row->tip_eveniment . "</td>";
echo "<td>" . $row->durata . "</td>";
echo "<td>" . $row->locuri_disponibile . "</td>";
echo "<td>" . $row->locuri_rezervate . "</td>";
echo "<td>" . $row->id_categorie . "</td>";
//echo "<td><a href='Proiect_modificare.php?id_eveniment=" . $row->id_eveniment . "'>Modifica evenimentul</a></td>";
//echo "<td><a href='Proiect_stergere.php?id_eveniment=" .$row->id_eveniment . "'>Stergere evenimentul</a></td>";
//echo "</tr>";
}
echo "</table>";
}
// daca nu sunt inregistrari se afiseaza un rezultat de eroare
else
{
echo "Nu sunt inregistrari in tabela!";
}
}
// eroare in caz de insucces in interogare
else
{ echo "Error: " . $mysqli->error(); }
// se inchide
$mysqli->close();
?>

</body>
</html>

<!--
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Vizualizare Inregistrari</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Inregistrarile din tabela datepers</h1>
<p><b>Toate inregistrarile din datepers</b></p>

<?php
// connectare bazadedate
//include("Proiect_conectare.php");

// se preiau inregistrarile din baza de date
/*if ($result = $mysqli->query("SELECT * FROM evenimente ORDER BY ora, data")) {
    // Verificare dacă există înregistrări
    if ($result->num_rows > 0) {
        // Initializare array pentru a grupa prezentarile pe ore
        $agenda = array();

        // Iterare prin fiecare înregistrare din result set
        while ($row = $result->fetch_object()) {
            // Extrage ora din data si adauga in array
            $ora = date("H:i", strtotime($row->ora));
            
            // Adauga informatii despre eveniment la array
            $agenda[$ora][] = array(
                'nume' => $row->nume,
                'descriere' => $row->descriere,
                'loc' => $row->loc,
                // ... adauga orice alte campuri pe care doresti sa le afisezi
            );
        }

        // Afiseaza agenda
        foreach ($agenda as $ora => $evenimente) {
            echo "<h2>Agenda pentru ora $ora</h2>";
            echo "<ul>";
            foreach ($evenimente as $eveniment) {
                echo "<li>";
                echo "<strong>Nume:</strong> {$eveniment['nume']}, ";
                echo "<strong>Descriere:</strong> {$eveniment['descriere']}, ";
                echo "<strong>Loc:</strong> {$eveniment['loc']}";
                // ... adauga orice alte informatii pe care doresti sa le afisezi
                echo "</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "Nu sunt inregistrari in tabela!";
    }
} else {
    echo "Error: " . $mysqli->error;
}

// Se inchide conexiunea
$mysqli->close();
?>
</body>
</html>
*/