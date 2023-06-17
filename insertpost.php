<?php
    session_start();
    $con = mysqli_connect("localhost", "root", "", "uiucms");
    $id = $_POST['post_id']
    $fromUser = $_POST['user'];
    $post_text = $_POST['post_text'];
    $time = $_POST['time'];
    $reaction = $_POST['total_reaction']
    $status = $_POST['status']

    $sql = "INSERT INTO `post`(`post_id`, `user`, `post_text`, `post_picture`, `time`, `total_reaction`, `status`)
    VALUES ('$id', '$fromUser', '$post_text' , '$pic','$time','$reaction','$status')";
    $con->query($sql);
?>