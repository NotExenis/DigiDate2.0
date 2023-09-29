<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../private/dbconnect.php';
    session_start();

    // Check if all required fields are filled in
    $requiredFields = ['firstname', 'email', 'password', 'gender', 'location', 'age'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['error'] = 'Please fill in all required fields.';
            header('Location: ../index.php?page=registration');
            exit;
        }
    }

    // Additional validation for specific fields (e.g., age)
    // if (!is_numeric($_POST['age']) || $_POST['age'] < 18) {
    //     $_SESSION['error'] = 'Invalid age. You must be at least 18 years old to register.';
    //     header('Location: ../index.php?page=registration');
    //     exit;
    // }

    // Check for illegal characters in user input
    $illegalCharacters = ['<', '>', '{', '}', '(', ')', '[', ']', '*', '$', '^', '`', '~', '|', '\\', '\'', '"', ':', ';', ',', '/'];
    $inputFields = ['firstname', 'lastname', 'email', 'weight', 'height', 'location'];
    foreach ($inputFields as $field) {
        if (strpbrk($_POST[$field], implode('', $illegalCharacters))) {
            $_SESSION['error'] = 'Illegal character used.';
            header('Location: ../index.php?page=registration');
            exit;
        }
    }

    try {
        // Check if the email is already in use
        $email = $_POST['email'];
        $sqlEmailCount = 'SELECT COUNT(*) AS count FROM tbl_users WHERE user_email = :email';
        $stmtEmailCount = $conn->prepare($sqlEmailCount);
        $stmtEmailCount->bindValue(':email', $email);
        $stmtEmailCount->execute();
        $emailCount = $stmtEmailCount->fetchColumn();
    
        if ($emailCount > 0) {
            $_SESSION['error'] = 'Email is already in use. Please use a different email address.';
            header('Location: ../index.php?page=registration');
            exit;
        }
    
        $sql = "INSERT INTO `tbl_users` (`user_name`, `user_lastname`, `user_email`, `user_password`, `user_gender`, `user_weight`, `user_height`, `user_tags`, `user_address`, `user_dateofbirth`, `user_role`, `user_profile`)
        VALUES (:firstname, :lastname, :email, :password, :gender, :weight, :height, :tags, :location, :age, :role, :profile)";
        $sth = $conn->prepare($sql);
        $sth->bindValue(':firstname', $_POST['firstname']);
        $sth->bindValue(':lastname', $_POST['lastname']);
        $sth->bindValue(':email', $_POST['email']);
        $sth->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT));
        $sth->bindValue(':gender', $_POST['gender']);
        $sth->bindValue(':weight', !empty($_POST['weight']) ? $_POST['weight'] : null);
        $sth->bindValue(':height', !empty($_POST['height']) ? $_POST['height'] : null);
        $sth->bindValue(':tags', $_POST['tags']);
        $sth->bindValue(':location', $_POST['location']);
        $sth->bindValue(':age', $_POST['age']);
        $sth->bindValue(':role', 0);
        $sth->bindValue(':profile', 'Placeholder Profile Data'); // Replace with actual profile data
        $sth->execute();

        $userId = $conn->lastInsertId();

        if ($userId) {
            $_SESSION['info'] = 'Account aangemaakt.';
            $_SESSION['userid'] = $userId;
            header('Location: ../index.php?page=home');
            exit;
        } else {
            $_SESSION['error'] = 'Failed to retrieve the last inserted ID.';
            header('Location: ../index.php?page=registration');
            exit;
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'An error occurred. Please try again or contact an admin if this issue persists.';
        header('Location: ../index.php?page=registration');
        exit;
    }    
?>