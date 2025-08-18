<?php
require "db.php";

$errors = array();

if (isset($_POST['firstname'])) {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);

    if (empty($firstname) || empty($lastname) || empty($email)) {
        if (empty($firstname)) $errors["firstname"] = "First name is required";
        if (empty($lastname)) $errors["lastname"] = "Last name is required";
        if (empty($email)) $errors["email"] = "Email address is required";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email address format";
    }
    else {
        $query = $pdo->prepare("INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')");
        $query->execute();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}
