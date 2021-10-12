<?php include('inc/header.php'); ?>
<?php include('inc/validation.php'); ?>
<?php
if (isset($_POST['submit'])) {

    $name = santInputSTRING($_POST['name']);
    $email = santInputEMAIL($_POST['email']);
    $password = santInputSTRING($_POST['password']);
    if (requireInput($name) && requireInput($email)) {
        if (minInput($name, 3)) {
            if (valInput($email)) {
                $id = $_POST['id'];
                if ($password) {
                    
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

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
                $ERROR = "ERROR3";
            }
        } else {
            $ERROR = "ERROR2";
        }
    } else {
        $ERROR = "ERROR1";
    }
}
?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">update info About User</h1>
<?php if ($ERROR) { ?>
    <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
        <?php
        echo $ERROR;
        ?>
    </div>
    <a href="javascript:history.go(-1)" class="btn btn-primary"><< Go Back</a>
<?php } ?>

<?php if ($success) { ?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $success;
        ?>
    </div>
<?php } ?>

<?php include('inc/footer.php'); ?>