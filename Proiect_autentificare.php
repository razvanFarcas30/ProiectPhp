<?php
session_start();
// informatii conectare.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'evenimente';
// Încercați să vă conectați folosind informațiile de mai sus.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER,
$DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
// Dacă există o eroare la conexiune, opriți scriptul și afișați eroarea.
exit('Esec conectare MySQL: ' . mysqli_connect_error());
}
// Acum verificăm dacă datele din formularul de autentificare au fost trimise,

if ( !isset($_POST['username'], $_POST['password']) ) {
// Nu s-au putut obține datele care ar fi trebuit trimise.
exit('Completati username si password !');
}
// Pregătiți SQL-ul nostru, pregătirea instrucțiunii SQL va împiedica injecțiaSQL.
if ($stmt = $con->prepare('SELECT id, password, is_admin FROM utilizatori WHERE
username = ?')) {
// Parametrii de legare (s = șir, i = int, b = blob etc.), în cazul nostru numelede utilizator este un șir, //așa că vom folosi „s”
$stmt->bind_param('s', $_POST['username']);
$stmt->execute();
// Stocați rezultatul astfel încât să putem verifica dacă contul există înbaza de date.
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($username, $password, $is_admin);
    $stmt->fetch();
// Contul există, acum verificăm parola.
// Notă: nu uitați să utilizați password_hash în fișierul de înregistrare pentrua stoca parolele hash.
    if (password_verify($_POST['password'],$password)) {
    // Verification success! User has loggedin!
    // Creați sesiuni, astfel încât să știm că utilizatorul este conectat, acesteaacționează practic ca cookie-//uri, dar rețin datele de pe server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        if($is_admin){
        echo 'Bine ati venit' . $_SESSION['name'] . '!';
        header('Location: Proiect_home.php');
        }
        else{
            header('Location: Proiect_evenimente.php');
        }
    } else
    {
    // password incorrect
        echo 'Incorrect  password!';
        }
} else {
// username incorect
echo 'Incorrect username ';
}
$stmt->close();
}
?>