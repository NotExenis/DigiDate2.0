<?php
require 'private/dbconnect.php' ;
$sql = "SELECT * FROM tbl_users WHERE user_whitelisted = 0 AND user_role = 'user'";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = "SELECT * FROM tbl_users WHERE user_whitelisted = 1 AND user_role = 'user' AND user_activated = 0";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
?>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
    <h1>Waiting on whitelist</h1>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Gender</th>
      <th scope="col">Geboorte datum</th>
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
        <form action="php/deny_user.php" method="post">
            <input type="hidden" name="id" value="<?= $r['user_id'] ?>">
            <button type="submit" class="btn btn-danger">Verwijder</button>
        </form>
      </td>

    </tr>
    <?php } ?>
  </tbody>
  <br>

<br>
</table>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm">
    </div>
    <div class="col-sm">
    <h1>Activated</h1>
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Gender</th>
      <th scope="col">Geboorte datum</th>
      <th scope="col">profiel</th>
      <th scope="col">Deactiveer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($stmt2 as $r2){ ?>
    <tr>
      <td><?= $r2['user_name'] ?></td>
      <td><?= $r2['user_gender'] ?></td>
      <td><?= $r2['user_dateofbirth'] ?></td>
      <td>
        <form action="index.php?page=user_profile" method="post">   
            <input type="hidden" name="id" value="<?= $r2['user_id'] ?>">
            <button type="submit"  class="btn btn-info">Profiel</button>
        </form>
      </td>
      <td>
        <form action="php/deactivate_user.php" method="post">   
            <input type="hidden" name="id" value="<?= $r2['user_id'] ?>">
            <button type="submit" onclick="return confirm('Weet u het zeker?')"  class="btn btn-danger">Deactiveer</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
