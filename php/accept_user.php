<?php 
require '../private/dbconnect.php' ;

$id = $_POST['id'];
$sql = "UPDATE tbl_users 
        SET user_whitelisted = 1
        WHERE user_id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(array(
    ':id'=> $id,
));
header('location: ../index.php?page=whitelist');

?>