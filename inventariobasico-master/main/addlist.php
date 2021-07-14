<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['login'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }

    if($_POST['name'] != null && $_POST['amount'] != null && $_POST['lote']!=null && $_POST['cantidad_disponible']!=null ){
        $sql = "INSERT INTO productos (producto,precio,lote,cantidad_disponible) VALUES ('". trim($_POST['name']). "',".trim($_POST['amount']).",'". trim($_POST['lote']) ."' , ".trim($_POST['cantidad_disponible']).")";
        if($conn->query($sql)){
            echo "<script>alert('Producto Agregado')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
        else{
            echo "<script>alert('Add failed')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert(Por favor ingrese toda la informacion.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>