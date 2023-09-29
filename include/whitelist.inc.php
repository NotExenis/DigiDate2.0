<?php
require 'private/dbconnect.php' ;
$sql = "SELECT * FROM tbl_users WHERE user_whitelisted = 0 AND user_role = 'user'";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<br>
<div class="container">
  <div class="row">
    <div class="col-">
    </div>
    <div class="col-sm">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Gender</th>
      <th scope="col">Geboorte datum</th>
      <th scope="col">Bekijk profiel</th>
      <th scope="col">Accepteer</th>
      <th scope="col">Verwijder</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($stmt as $r){ ?>
    <tr>
      <td><?= $r['user_name'] ?></td>
      <td><?= $r['user_gender'] ?></td>
      <td><?= $r['user_dateofbirth'] ?></td>
      <td>
        <form action="php/accept_user.php" method="post">
            <input type="hidden" name="id" value="<?= $r['user_id'] ?>">
            <button type="submit" class="btn btn-success">Accepteer</button>
        </form>
      </td>
      <td>
        <form action="index.php?page=user_profile" method="post">
            <input type="hidden" name="id" value="<?= $r['user_id'] ?>">
            <button type="submit" class="btn btn-info">Profiel</button>
        </form>
      </td>
      <td>
        <form action="php/deny_user.php" method="post">
            <input type="hidden" name="id" value="<?= $r['user_id'] ?>">
            <button type="submit" class="btn btn-danger">Verwijder</button>
        </form>
      </td>

    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <div class="col-">
    </div>
  </div>
</div>