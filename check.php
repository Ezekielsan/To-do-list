<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id= $_POST['id'];
    if(empty($id)){
        echo 'error';
    }else {
           $ezekiel = $conn->prepare("SELECT id, checked FROM ezekiel WHERE id=?");
           $ezekiel->execute([$id]);
           $todo = $ezekiel->fetch();
           $uId = $todo['id'];
           $checked = $todo['checked'];

           $uChecked = $checked ? 0 : 1;

           $res = $conn->query("UPDATE ezekiel SET checked=$uChecked WHERE id=$uId");

           if($res){
                  echo $checked;
           }else {
            echo "error" ;
           }
            $conn = null ;
            exit();
    }
}else{
    header("location: ../azrael.php?mess=error");
}