<?php
require "include/db.php";

$errors = array();

if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);

    if (empty($firstname) || empty($lastname) || empty($email)) {
        if (empty($firstname)) $errors["firstname"] = "First name is required";
        if (empty($lastname)) $errors["lastname"] = "Last name is required";
        if (empty($email)) $errors["email"] = "Email address is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email address format";
    } else {
        $query = $pdo->prepare("INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')");
        $query->execute();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Who Wins?</title>
</head>

<body>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
        <img src="assets/imgs/spong.png" alt="spong">
        <div class="col-md-6 p-lg-5 mx-auto">
            <h1 class="display-3 fw-bold mb-4">Win w1z Spongbob 🏆</h1>
            <h3 class="fw-normal text-primary my-4" id="time-counter"></h3>
            <h5 class="fw-normal mb-3">Enter your info to join my giveaway</h5>
            <div class="btn btn-outline-secondary">Coming Soon</div>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>

    <div class="container">
        <div class="card position-relative overflow-hidden p-md-3 m-md-3">
            <div class="card-body">
                <h3 class="card-title">Join Giveaway</h3>
                <div class="card-body">
                    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Sayed">
                            <div class="form-text error text-danger"><?= $errors["firstname"] ?? "" ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Reda">
                            <div class="form-text error text-danger"><?= $errors["lastname"] ?? "" ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                            <div class="form-text error text-danger"><?= $errors["email"] ?? "" ?></div>
                        </div>

                        <input type="submit" value="Send Details" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 col-3 mx-auto my-5">
            <button type="button" class="btn btn-success d-none" id="winner-btn">
                Select Winner
            </button>
        </div>

        <!-- Loader -->
        <div class="loader-container">
            <div id="loader">
                <canvas id="circularLoader" width="200" height="200"></canvas>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="winnerModal" tabindex="-1" aria-labelledby="winnerModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-title">Winner 🎉</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="display-3 text-center text-capitalize" id="winner-name"></h1>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js"></script>
    <script src="assets/js/loader.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>