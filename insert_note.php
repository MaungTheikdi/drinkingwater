<?php

//$user = $_SESSION["username"];
//$user_type = $_SESSION["user_type"];

include ('includes/connection.php');

if(isset($_POST['save_message'])) {
    
    $a = $_POST['message'];
    $b = $_POST['color_name'];
    $c = $_POST['note_by'];
    $date = date('Y-m-d');


    $message_qry = "INSERT INTO note(note_name, note_color, note_by, created_date) VALUES ('$a','$b','$c', '$date')";

    if (mysqli_query($link, $message_qry)){
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . " " . mysqli_error($link);
    }
    mysqli_close($link);
}

?>