<?php 
require '../private/dbconnect.php' ;

$id = $_POST['id'];
$sql = "UPDATE tbl_users
        SET user_whitelisted = null
        WHERE user_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array( 
    ':id' => $id,
));

$sql2 = "SELECT user_email FROM tbl_users WHERE user_id = :id";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(array( 
    ':id' => $id,
));

$r = $stmt2->fetchAll();

$to = $r[0]['user_email'];
$subject = "Request denied";
$message = "Your request to join has been denied";
$headers = "From: joebiden@gmail.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email delivery failed.";
}

header('location: ../index.php?page=whitelist');
?>