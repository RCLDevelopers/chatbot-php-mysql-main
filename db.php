<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "chatbot";

$conn = mysqli_connect($host, $username, $password, $dbName);

if (!$conn) {
    echo
    '<div class="container alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DB Connection Failed</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    die();
}
