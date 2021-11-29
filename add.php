<?php 
include('inc/header.php');
include('inc/validation.php');

if (isset($_POST['Submit'])) {

    // $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    // $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    // $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    // $formErrores = [];

    // if (strlen($name) < 5) {
    //     $formErrores[] = "A field cannot be left <strong>username!</strong> blank";
    // }
    // if (strlen($email) == 0) {
    //     $formErrores[] = "A field cannot be left <strong>email!</strong> blank";
    // }
    // if (strlen($password) < 5) {
    //     $formErrores[] = "A field cannot be left <strong>password!</strong> blank";
    // } 


    $name = santInputSTRING($_POST['name']);
    $email = santInputEMAIL($_POST['email']);
    $password = santInputSTRING($_POST['password']);

    if (requireInput($name) && requireInput($email) && requireInput($password)) {
        if (minInput($name, 3) && maxInput($password, 20)) {
            if (valInput($email)) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`)
                    VALUES ('$name','$email','$password_hash')";

                $result = mysqli_query($my_sqli, $sql);
                if ($result) {
                    $success = "Addid Successfully ";
                    header("refresh:3;url=index.php");
                }
            } else {
                $ERROR = "ERROR2";
            }
        } else {
            $ERROR = "ERROR2";
        }
    } else {
        $ERROR = "ERROR1";
    }
}
?>

<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <?php if ($ERROR) { ?>
            <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
                <?php
                echo $ERROR;
                ?>
            </div>
        <?php } ?>

        <?php if ($success) { ?>
            <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                <?php
                echo $success;
                ?>
            </div>
        <?php } ?>

        <!-- ERROR El Zero -->

        <?php // if (!empty($formErrores)) { 
        ?>
        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert"> -->
        <?php
        // foreach ($formErrores as $ERROR) {
        // echo $ERROR . "<br>";
        // }
        ?>
        <!-- </div> -->
        <?php //} 
        ?>

        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>