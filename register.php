<?php
if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    //INSERT INTO data_users (username, email, password, password2) VALUES ('a', 'a@a', 'a', 'a')
    if ($password == $password2) {
        $link = mysqli_connect("localhost", "ki404616_admin", "kastle2020", "ki404616_user_data");
        $hashed_password =  md5($_POST["password"]);

        $query = mysqli_query( "SELECT * FROM data_users WHERE `username`='.$username'");
        $res = mysqli_query($query);
        if (mysqli_num_rows($res) > 0) {
            echo "<script> alert('Username  already taken');</script>";
        } else {

            if ($link) {
                //Check if already registered.
                $query = "INSERT INTO data_users (name,  username, email, password, password2) VALUES ('" . $name . "','" . $username . "', '" . $email . "', '" . $hashed_password . "', '" . $password2 . "')";
                $result = mysqli_query($link, $query);
                header("Location: /index.html");

            }
        }
    }
}
?>
