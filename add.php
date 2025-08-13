<?php

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title= $_POST['title'];
    if(empty($title)){
        header("location: ../azrael.php?mess=error");
    }else {
            $stmt = $conn->prepare("INSERT INTO ezekiel(title) VALUE(?)");
            $res = $stmt->execute([$title]);

            if($res){
                header("location: ../azrael.php?mess=success"); 
            }else{
                header("location: ../azrael.php ");
            }
            $conn = null ;
            exit();
    }
}else{
    header("location: ../azrael.php?mess=error");
}