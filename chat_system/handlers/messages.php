<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .single-message{
        padding: 5px 0px 5px 0px;
        border-bottom:1px solid #b3b3b3;
    }
    .single-message span{
        float:right;
    }
    </style>
</head>
<body>
<?php
include('../config.php');
switch($_REQUEST['action']){
    case "sendMessage":
        session_start();
        $query = $db->prepare("INSERT INTO messages SET user=?, message=?");
        $run=$query->execute([$_SESSION['username'], $_REQUEST['message']]);
        if($run){
            echo 1;
            exit();
        }
    break;

    case "getMessages":
        $query = $db->prepare("SELECT * FROM messages");
        $run= $query->execute();

        $rs=$query->fetchAll(PDO::FETCH_OBJ);
        //echo var_dump($rs);  // echos imfp about one or more variable
        $chat = '';
        foreach($rs as $message){
         //   $chat .= $message->message.'<br />';
            $chat .= '<div class="single-message"><strong> '.$message->user.':</strong> '.$message->message.'<span>'.$message->date.'</div>';
        }
        echo ($chat);
        
        break;
}

?>
</body>
</html>

<?php

