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

<!-- Profile Edit Section -->
<div id="profile-edit">
    <h2>Edit Profile</h2>
    <form method="POST" action="profile.php">
        <!-- Add form fields for editing user information here -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userData['user_name']; ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userData['user_email']; ?>"><br>

        <!-- Add more form fields for editing user information here -->

        <input type="submit" value="Save Changes">
    </form>
</div>