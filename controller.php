<?php
include "./db.php";

$queryMessage = mysqli_real_escape_string($conn, trim($_POST['queryMessage']));

$query = "SELECT answer FROM querybank WHERE query LIKE '%$queryMessage%'";
$records = mysqli_query($conn, $query);

if (mysqli_num_rows($records) > 0) {
    $result = mysqli_fetch_assoc($records);
    echo $result['answer'];
} else {
    echo "Sorry, I could not get that. <br> <br> Please try again.";
}
