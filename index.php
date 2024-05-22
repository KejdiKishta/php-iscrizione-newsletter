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
require_once __DIR__ . "/partials/functions.php";

if (isset($_POST["user-email"])) {
    $user_email = $_POST["user-email"];
    $result = check_email($user_email);
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
        <?php if (isset($result)) { ?>
            <div class="p-3 w-50 mx-auto my-3 <?php echo $result ? "bg-success-subtle" : "bg-danger-subtle" ?>">
            <?php echo $result ? "Grazie per esserti iscritto alla newsletter di Boolean!" : "La mail è errata!"?>
            </div>
        <?php } ?>
    </div>
</body>
</html>