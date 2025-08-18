<?php
require "include/submit.php";

$query = $pdo->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($users);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <title>Who Wins?</title>
</head>

<body>
    <div class="container">
    
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
            <div class="col-md-6 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-bold mb-4">Win W1Z Sayed 🏆</h1>
                <h3 class="fw-normal text-muted mb-3">Enter your info to join my giveaway</h3>
                <h3 class="fw-normal text-muted mb-3">Enter your info to join my giveaway</h3>
                <button class="btn btn-outline-secondary">Coming Soon</button>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div> 
   

        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <h3>Please enter your details</h3>
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

        <div class="row my-5 gy-3">
            <?php foreach ($users as $user): ?>
            <div class="col-sm-6">
                <div class="card bg-light">
                    <div class="card-body">
                        <div class="card-title"><?= $user['firstname'] . " " . $user['lastname'] ?></div>
                        <div class="card-text"><?= $user['email'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- <script src="bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>