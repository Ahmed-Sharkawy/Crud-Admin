<?php include('inc/header.php'); ?>
<?php
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("location: index.php");
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE `user_id`=$id limit 1 ";

        $result = mysqli_query($my_sqli, $sql);
        $check = mysqli_num_rows($result);

        if (!$check) {
            header("refresh:2;url=index.php");
        }

        $sql = "DELETE FROM `users` WHERE `user_id`='$id'";
        mysqli_query($my_sqli, $sql)

?>
    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">User Have Benn Deleted </h1>
        <?php header("refresh:2;url=index.php")?>

<?php include('inc/footer.php'); ?>