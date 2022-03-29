<?php
ob_start();
include 'inc/header.php';

if (isset($_SESSION['user_id'])) {
  header('Location: index.php');
}

?>
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

  <form action="" method="POST" style="width: 450px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $passw = sha1($_POST['password']);

  $sql = "SELECT * FROM `users` WHERE `user_email` = '$email' AND `user_password` = '$passw'";

  $res = mysqli_query($my_sqli, $sql);


  if (mysqli_num_rows($res)) {
    $data = mysqli_fetch_assoc($res);
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['user_name'] = $data['user_name'];
    $_SESSION['user_email'] = $data['user_email'];
    echo $_SESSION['user_email'];
    header('Location: index.php');
    exit;
  } else {
    echo 0;
  }
}

include 'inc/footer.php';
ob_end_flush();
?>