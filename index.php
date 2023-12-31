<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  }

  require_once 'private/dbconnect.php';
  session_start();

//   $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php if (isset($page)) { echo $page; } else {echo "Home";}?></title>
  <link href="style/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.0-beta.3/dist/iconify-icon.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
</head>
<body class="bg-secondary">
  <?php
    require_once 'include/navbar.inc.php';

    try {
      if (isset($page)) {
        $file = 'include/'.$page.'.inc.php';
        if (file_exists($file)) {
          require_once $file;
        } else {
          header("Location: index.php?page=404");
          exit();
        }
      } else {
        require_once 'include/home.inc.php';
      }
    } catch (\Exception $e) {
      echo '<meta http-equiv="refresh" content="0; url=index.php?page=home" />';
    }

    // Debugging: display the contents of the session
    // echo "<pre>", print_r($_SESSION),"</pre>";

    require_once 'include/error.inc.php';
    require_once 'include/info.inc.php';
  ?>
</body>
</html>