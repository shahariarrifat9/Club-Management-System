<?php
    session_start();
    $user = $_SESSION['user'];
    if(isset($_POST['pass_but'])){
        $cur_pass = $_POST['cur_pass'];
        $new_pass = $_POST['new_pass'];
        $conf_pass = $_POST['conf_pass'];
        $con = mysqli_connect("localhost", "root", "", "uiucms");
        $sql = "SELECT * FROM users WHERE id = '$user' AND pass = '$cur_pass'";
        $result = $con->query($sql);
        if($new_pass != $conf_pass){
            echo "New password and retype new password didn't matched";
        }
        else{
            while($rows = mysqli_fetch_assoc($result)){
                extract($rows);
                if($cur_pass != $rows['pass']){
                    echo "Current password not matched";
                }
                else{
                    $sql2 = "UPDATE `users` SET `pass` = '$new_pass' WHERE `id` = '$user'";
                    $con->query($sql2);
                    echo "Password changed Successfully";
                }
            }
        }
    }
?>