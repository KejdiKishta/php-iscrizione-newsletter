<!-- Creiamo una pagina web che conterrà un form HTML e implementiamo un sistema di validazione per l'indirizzo email inserito dall'utente, assicurandoci che sia ben formattato e che contenga un punto ed una chiocciola. -->

<!-- Milestone 1 (creazione del form)
Creare un file index.php contenente un form HTML con un campo di input per l'inserimento dell'indirizzo email.
Implementare la logica di controllo dell'email direttamente in index.php.
Mostrare il risultato della validazione sulla stessa pagina. -->

<!-- Milestone 2 (functions.php)
Creare un file functions.php per gestire la logica di controllo dell'email.
Utilizzare l'istruzione include in index.php per incorporare il file functions.php.
Rifattorizzare il codice in modo che la logica di controllo dell'email sia contenuta in functions.php. -->

<!-- Milestone 3: (Stile dell'alert)
Modificare la classe dell'alert in base all'esito della funzione di validazione.
Utilizzare la classe alert-success per indicare un esito positivo e alert-danger per un esito negativo. -->

<!-- BONUS:
Milestone 4: (Redirect)
Implementare un redirect a una pagina di ringraziamento (thankyou.php) in caso di esito positivo.
Utilizzare la session PHP per memorizzare l'indirizzo email registrato durante la procedura di validazione.
Milestone 5: (Visualizzare valore errato)
Nel caso di esito negativo, garantire che il valore inserito precedentemente nel campo di input rimanga visibile.
Sfruttare le variabili GET per mantenere e visualizzare l'indirizzo email errato nell'input. -->

<?php
if (isset($_POST["user-email"])) {
    $user_email = $_POST["user-email"];
    if (str_contains($user_email, ".it") || str_contains($user_email, ".com") ) {
        $check_mail = "Grazie per esserti iscritto alla newsletter di Boolean";
        $esito = "bg-success-subtle";
    } else {
        $check_mail = "L'email inserita è errata, deve terminare con '.it' o '.com'";
        $esito = "bg-danger-subtle";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boolean Newsletter</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container py-5">
        <form class="border p-3 w-50 mx-auto" action="index.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="user-email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if (isset($_POST["user-email"])) { ?>
            <div class="p-3 w-50 mx-auto my-3 <?php echo $esito ?>">
            <?php echo $check_mail?>
            </div>
        <?php } ?>
    </div>
</body>
</html>