<?php
ob_start();
include('inc/header.php');
include('inc/nav.php');
include('inc/validation.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if (isset($_POST['submit'])) {

    $name = santInputSTRING($_POST['name']);
    $email = santInputEMAIL($_POST['email']);
    $password = santInputSTRING($_POST['password']);
    if (requireInput($name) && requireInput($email)) {
        if (minInput($name, 3)) {
            if (valInput($email)) {
                $id = $_POST['id'];
                if ($password) {

                    $password_hash = sha1($password);

                    $sql = "UPDATE `users` SET `user_name`='$name', `user_email`='$email', `user_password`='$password_hash'
                        WHERE `user_id`='$id'";
                } else {
                    $sql = "UPDATE `users` SET `user_name`='$name', `user_email`='$email'
                        WHERE `user_id`='$id'";
                }

                $result = mysqli_query($my_sqli, $sql);

                if ($result) {
                    $success = "Updated Successfully";
                    header('refresh:2;url=index.php');
                }
            } else {
                $ERROR = "Email Verification";
            }
        } else {
            $ERROR = "Verify that the field contains more than five characters";
        }
    } else {
        $ERROR = "Make sure to fill in all fields";
    }
} else {
    header('Location: index.php');
}
?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">update info About User</h1>
<?php if ($ERROR) : ?>
    <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
        <?php
        echo $ERROR;
        ?>
    </div>
    <a href="javascript:history.go(-1)" class="btn btn-primary"> << Go Back</a>
<?php endif; ?>

<?php if ($success) : ?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $success;
        ?>
    </div>
<?php endif; ?>

<?php
include('inc/footer.php');
ob_end_flush();
?>