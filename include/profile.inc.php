<?php
    $_SESSION['userid'] = 1;
    // Check if the user is logged in
    if (!isset($_SESSION['userid'])) {
        // Redirect to the login page or show an error message
        header('Location: index.php?page=login');
        exit;
    }

    // Fetch user data from the database based on the session user ID
    $userId = $_SESSION['userid'];
    try {
        // Replace 'your_table_name' with the actual table name in your database
        $sql = "SELECT * FROM tbl_users WHERE user_id = :userid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':userid', $userId);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle database error
        die("Database Error: " . $e->getMessage());
    }
?>

<!-- Profile View Section -->
<div id="profile-view">
    <h2>My Profile</h2>
    <!-- Display user profile picture -->
    <img src="path_to_profile_picture.jpg" alt="Profile Picture">

    <!-- Display user information from the database -->
    <p>Name: <?php echo $userData['user_name']; ?></p>
    <p>Email: <?php echo $userData['user_email']; ?></p>
    <p>Gender: <?php echo $userData['user_gender']; ?></p>
    <p>Weight: <?php echo $userData['user_weight']; ?> kg</p>
    <p>Height: <?php echo $userData['user_height']; ?> cm</p>
    <p>Tags: <?php echo $userData['user_tags']; ?></p>
    <p>Address: <?php echo $userData['user_address']; ?></p>
    <p>Date of Birth: <?php echo $userData['user_dateofbirth']; ?></p>

    <!-- Add more user information from the database here -->
</div>