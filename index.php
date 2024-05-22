<?php
require_once __DIR__ . "/partials/functions.php";

$result = false;
$error = "";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["user-email"])) {
    $user_email = $_POST["user-email"];
    $result = check_email($user_email);
    
    if ($result) {
        $_SESSION["auth"] = true;
        header("Location: ./thankyou.php");
    } else {
        $error = "La mail inserit è errata! controlla che finisca con .com o .it";
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
        <div>

        </div>
        <form class="border p-3 w-50 mx-auto" action="index.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="user-email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if (!empty($error)) { ?>
            <div class="p-3 w-50 mx-auto my-3 bg-danger-subtle">
            <?php echo $error ?>
            </div>
        <?php } ?>
    </div>
</body>
</html>