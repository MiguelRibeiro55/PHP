<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
$con = mysqli_connect("localhost", "ki404616_admin", "kastle2020", "ki404616_user_data");
$hashed_password =  md5($_POST['password']);


$result = mysqli_query($con, "SELECT username, email, name  FROM data_users WHERE `email`='$email' && `password`='$hashed_password'");
$count = mysqli_num_rows($result);
if ($count == 1) {

    $row = mysqli_fetch_row($result);
    $_SESSION['log'] = 1;
    $_SESSION['username'] = $row[0];
    $_SESSION['email'] = $row[1];
    $_SESSION['name'] = $row[2];

    header("Location: /profile.php");
    exit();

} else {
    echo "please fill proper details". $hashed_password ;
    header("Location: /index.php");// it takes 2 sec to go index page
}
